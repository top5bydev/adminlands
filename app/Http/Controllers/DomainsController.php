<?php

namespace App\Http\Controllers;

use Request;
use App\Sites;
use App\Pages;
use Mobile_Detect;
use Etechnika\IdnaConvert\IdnaConvert as IdnaConvert;
use Webwizo\Shortcodes\Facades\Shortcode;

class DomainsController extends Controller
{

    public function index()
    {
        $twig = new \Twig_Environment(new \Twig_Loader_String());
        // Если заходят на сайты, которые имеют мобильную версию. То делаем редирект с сохранением меток
        if (Request::getHost() == 'steklopaket5.by') {
            $detect = new Mobile_Detect;
            if ($detect->isMobile()) {
                return redirect('/m/?' . Request::server('QUERY_STRING'));
            }
        }

        $site = Sites::where('name', IdnaConvert::decodeString(Request::getHost()))->firstOrFail();
        $site->name = IdnaConvert::decodeString($site->name);


        $site->body = $twig->render( $site->body);

        return view('sites.index')->with(
            [
                'site' => $site,
                ]
        );
    }

    public function page(Request $request, $slug)
    {

        if (Request::getHost() == 'steklopaket5.by' and Request::path() !== 'm') {
            $detect = new Mobile_Detect;
            if ($detect->isMobile()) {
                return redirect('/m/?' . Request::server('QUERY_STRING'));
            }
        }

        $page = Pages::where('slug', $slug)->firstOrFail();
        $site = Sites::where('id', $page->site_id)->firstOrFail();


        return view('sites.page')->with([
            'page' => $page,
            'site' => $site
        ]);
    }

    public function thank()
    {
        $site = Sites::where('name', IdnaConvert::decodeString(Request::getHost()))->firstOrFail();

        return view('global_pages.thank')->with('site', $site);
    }

    public function newyear()
    {
        $site = Sites::where('name', IdnaConvert::decodeString(Request::getHost()))->firstOrFail();

        return view('global_pages.newyear')->with('site', $site);
    }

}

