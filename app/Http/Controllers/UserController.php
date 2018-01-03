<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;
use Auth;
use App\User;
use Hash;

class UserController extends Controller {
    public function profile() {
        return view( 'auth.profile', [ 'user' => Auth::user() ] );
    }

    public function postCredentials( Request $request ) {
        if ( Auth::Check() ) {
            $request_data = $request->All();

            $user_id            = Auth::User()->id;
            $obj_user           = User::find( $user_id );
            $obj_user->password = Hash::make( $request_data['password'] );;
            $obj_user->save();

            $request->session()->flash( 'alert-info', 'Пароль <b>' . $request_data['password'] . '</b> для <b>' . $obj_user->name . '</b> успешно  сохранен' );

            return redirect()->route( 'admin.index' );
        }
    }


}