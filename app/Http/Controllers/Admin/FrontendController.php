<?php

namespace App\Http\Controllers\Admin;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
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
        // Cache::forget("chunk"); // clear chunk

        return view("dashboard");
    }

    /**
     * Display a inbox page of the admin panel.
     *
     * @return \Illuminate\Http\Response
     */
    public function inbox(Request $request)
    {
        // return $request->all();
        $per_page = Cache::get('per_page', 50);
        // $chats = Chat::where('user_id', "=", Auth::user()->id)->paginate($per_page)->onEachSide(1);
        $chats = [];
        $users = Chat::select('user_id')->distinct()->pluck('user_id');
        $users = User::select("id", "avatar", "first_name", "last_name", 'created_at')->whereIn('id', $users)->get();

        return view("inbox", compact("chats", "users"));
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
     * Display a settings page of the admin panel.
     *
     * @return \Illuminate\Http\Response
     */
    public function settings(Request $request)
    {
        $user = Auth::user();
        return view("settings", compact("user"));
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
