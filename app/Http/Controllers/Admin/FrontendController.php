<?php

namespace App\Http\Controllers\Admin;

use App\Models\Chat;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
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
        $cache_ttl = 60; // cache timer
        $newUsers = Cache::remember('new_users_today', 60 * $cache_ttl, fn () => number_format(User::whereNot("isAdmin", true)->whereDate('created_at', Carbon::today())->count()));
        $totalUsers = Cache::remember('total_users', 60 * $cache_ttl, fn () => number_format(User::whereNot("isAdmin", true)->count()));

        $cache_ttl = 1; // cache timer

        $orders = Cache::remember('order_charts', 60 * $cache_ttl, function () {
            return Order::selectRaw('year(created_at) year, month(created_at) month, count(*) count')
                ->whereBetween(
                    'created_at',
                    [Carbon::now()->subMonth(12), Carbon::now()]
                )
                ->orderBy("month")
                ->groupBy('year', 'month')
                ->get();
        });

        $users = Cache::remember('user_charts', 60 * $cache_ttl, function () {
            return User::selectRaw('year(created_at) year, month(created_at) month, count(*) count')
                ->whereBetween(
                    'created_at',
                    [Carbon::now()->subMonth(12), Carbon::now()]
                )
                ->whereNot("isAdmin", true)
                ->groupBy('year', 'month')
                ->orderBy("month")
                ->get();
        });

        $ordersArr =  $orders->pluck("count");
        $totalOrders = $orders->sum('count');

        $totalUsersLast12Months =  $users->sum('count');

        return view("dashboard", compact("orders", "ordersArr", "totalOrders", "users", "totalUsers", "newUsers", "totalUsersLast12Months"));
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
        $users = User::with(["chats"])->select("id", "avatar", "first_name", "last_name", 'status', 'created_at')->whereIn('id', $users)->where('id', '!=', Auth::user()->id)->get();
        $receiver = null;
        return view("inbox", compact("chats", "users", 'receiver'));
    }


    /**
     * Display a messages page of the admin panel.
     *
     * @return \Illuminate\Http\Response
     */
    public function messages(Request $request)
    {
        $per_page = Cache::get('per_page', 50);
        // $chats = Chat::where('user_id', "=", Auth::user()->id)->paginate($per_page)->onEachSide(1);
        $chats = [];
        $users = Chat::select('user_id')->distinct()->pluck('user_id');
        $users = User::with(["chats"])->select("id", "avatar", "first_name", "last_name", 'status', 'created_at')->whereIn('id', $users)->where('id', '!=', Auth::user()->id)->get();
        $receiver = User::select("id", "avatar", "first_name", "last_name", 'status', 'created_at')->where("id", '=', $request->user)->where('id', '!=', Auth::user()->id)->first();
        if (isset($receiver->id)) {
            $chats = Chat::where("user_id", "=", $receiver->id)->orWhere("receiver_id", "=", $receiver->id)->paginate($per_page)->onEachSide(1);
        }
        return view("inbox", compact("chats", "users", 'receiver'));
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
