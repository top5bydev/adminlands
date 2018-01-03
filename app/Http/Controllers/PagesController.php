<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sites;
use App\Pages;

class PagesController extends Controller {
    public function index( Request $request, $id ) {

        $site  = Sites::where( 'id', $id )->firstOrFail();
        $pages = Pages::all()->where( 'site_id', $id );

        return view( 'admin.pages.index', [ 'pageTitle' => 'Список страниц сайта ' . $site->name, ] )
            ->with( [
                'pages' => $pages,
                'site'  => $site
            ] );
    }

    public function create( Request $request, $id ) {
        $site = Sites::where( 'id', $id )->firstOrFail();

        return view( 'admin.pages.create', [ 'pageTitle' => 'Добавить страницу для сайта ' . $site->name ] )
            ->with( [ 'site' => $site ] );
    }

    public function edit( Request $request, $id, $pid ) {
        $site = Sites::where( 'id', $id )->firstOrFail();
        $page = Pages::where( 'id', $pid )->firstOrFail();

        return view( 'admin.pages.create',
            [
                'pageTitle' => 'Редактировать страницу <b>' . $page->name . '</b> для сайта ' . $site->name
            ] )->with( [
            'site' => $site,
            'page' => $page,
        ] );
    }

    public function store( Request $request ) {
        $site_id = $request->get( 'site_id' );
        $page_id = $request->get( 'page_id' );

        if ( $page_id ) {
            $page  = Pages::findOrFail( $page_id );
            $input = $request->all();
            $page->fill( $input )->save();
        } else {
            $page = Pages::create( $request->all() );
        }

        $request->session()->flash( 'alert-info', 'Страница <b>' . $page->name . '</b> успешно сохранена' );

        return redirect()->route( 'pages.edit', [
                'id'  => $site_id,
                'pid' => $page->id
            ]
        );
    }

    public function delete( Request $request, $id, $pid ) {
        $page = Pages::findOrFail( $pid );

        $page->delete();

        $request->session()->flash( 'alert-info', 'Страница <b>' . $page->name . '</b> успешно удалена' );

        return redirect()->route( 'pages.index', [ 'id' => $id ] );
    }

}