<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sites;

class SitesController extends Controller {
    public function index() {
        $sites = Sites::all();

        return view( 'admin.sites.index', [ 'pageTitle' => 'Список сайтов', ] )->with( 'sites', $sites );
    }

    public function create( Request $request ) {
        return view( 'admin.sites.create', [ 'pageTitle' => 'Добавить сайт', ] );
    }

    public function edit( Request $request, $id ) {
        $site = Sites::where( 'id', $id )->first();

        return view( 'admin.sites.create',
            [
                'pageTitle' => 'Редактировать сайт <b>' . $site->name .'</b>'
            ] )->with( 'site', $site );
    }

    public function store( Request $request ) {
        $site_id = $request->get( 'site_id' );

        if ( $site_id ) {
            $site  = Sites::findOrFail( $site_id );
            $input = $request->all();
            $site->fill( $input )->save();
        } else {
            $site = Sites::create( $request->all() );
        }

        $request->session()->flash( 'alert-info', 'Сайт успешно <b>' . $site->name . '</b> сохранен' );

        return redirect()->route( 'sites.edit', [ 'id' => $site->id ] );
    }


    public function delete( Request $request, $id ) {
        $site = Sites::findOrFail( $id );

        $site->delete();

        $request->session()->flash( 'alert-info', 'Сайт <b>' . $site->name . '</b> успешно удален' );

        return redirect()->route( 'sites.index' );
    }

}