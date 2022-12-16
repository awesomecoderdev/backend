<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class FrontendController extends Controller
{

    /**
     * Display a index page of the admin panel.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $users = User::whereNot("id", "=", Auth::user()->id)->delete();
        // dd($users);
        return view("dashboard");
    }

    /**
     * Display a index page of the admin panel.
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome(Request $request)
    {
        return view("welcome");
    }

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
        return redirect()->route("index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function logout(User $user)
    {
        Session::flush();
        Auth::guard('web')->logout();
        return  redirect()->route("index");
    }
}
