<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class FrontendController extends Controller
{

    /**
     * Display a index page of the admin panel.
     *
     * @return \Illuminate\Http\Response
     */
    public function language(Request $request)
    {
        if (isset($request->lang) && in_array($request->lang, config("app.available_locales"))) {
            App::setLocale(strtolower($request->lang));
            Session::put('locale', strtolower($request->lang));
        }
        return redirect()->back()->with([
            "success" => __("Language successfully changed.")
        ]);
    }

    /**
     * Display a index page of the admin panel.
     *
     * @return \Illuminate\Http\Response
     */
    public function paginator(Request $request)
    {
        if (isset($request->per_page) && in_array($request->per_page, config("app.per_page"))) {
            Cache::forever("per_page", $request->per_page);
        }
        return redirect()->back()->with([
            "success" => __("Show per page successfully changed.")
        ]);
    }

    /**
     * Display a index page of the admin panel.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view("client.index");
    }


    /**
     * Display a dashboard page of the admin panel.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard(Request $request)
    {
        return view("client.dashboard");
    }

    /**
     * Display a featured page of the admin panel.
     *
     * @return \Illuminate\Http\Response
     */
    public function gettingstarted(Request $request)
    {
        return view("client.getting-started");
    }

    /**
     * Display a getting-started page of the admin panel.
     *
     * @return \Illuminate\Http\Response
     */
    public function featured(Request $request)
    {
        return view("client.featured");
    }


    /**
     * Display a blog page of the admin panel.
     *
     * @return \Illuminate\Http\Response
     */
    public function blog(Request $request)
    {
        return view("client.blog");
    }

    /**
     * Display a pricing page of the admin panel.
     *
     * @return \Illuminate\Http\Response
     */
    public function pricing(Request $request)
    {
        return view("client.pricing");
    }

    /**
     * Display a index page of the admin panel.
     *
     * @return \Illuminate\Http\Response
     */
    public function chunk(Request $request)
    {
        // Cache::forget("chunk"); // clear chunk

        if (!Cache::has("chunk")) {
            Cache::add("chunk", md5(strtotime("+5 minutes")), 60 * 5);
        }
        Cache::add("chunk", md5(strtotime("+5 minutes")), 60 * 5);
        $chunk = Cache::get("chunk", md5(strtotime("+5 minutes")));
        if ($request->time == $chunk) {
            return response()->view('scripts.chunk')->header('Content-Type', 'application/javascript');
        }
        abort(\Illuminate\Http\Response::HTTP_NOT_FOUND);
    }


    /**
     * Display a index page of the admin panel.
     *
     * @return \Illuminate\Http\Response
     */
    public function alpine(Request $request)
    {
        // Cache::forget("alpine"); // clear alpine

        if (!Cache::has("alpine")) {
            Cache::add("alpine", md5(strtotime("+10 minutes")), 60 * 10);
        }
        Cache::add("alpine", md5(strtotime("+10 minutes")), 60 * 10);
        $alpine = Cache::get("alpine", md5(strtotime("+10 minutes")));
        if ($request->time == $alpine) {
            return response()->view('scripts.alpine')->header('Content-Type', 'application/javascript');
        }
        abort(\Illuminate\Http\Response::HTTP_NOT_FOUND);
    }
}
