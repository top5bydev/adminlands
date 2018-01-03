<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $hashed_random_password = Hash::make('test');

        $user_id            = Auth::User()->id;
        $obj_user           = User::find( 1 );
        $obj_user->password = $hashed_random_password;
        $obj_user->save();

        return view('home');
    }


}
