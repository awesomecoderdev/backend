<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Plan;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\UpdateSettingsRequest;

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

        $cache_ttl = 1; // cache timer
        // $orders = Cache::remember('orders_chart', 60 * $cache_ttl, function () {
        //     return Order::selectRaw('year(created_at) year, month(created_at) month, count(*) count')
        //         ->whereBetween(
        //             'created_at',
        //             [Carbon::now()->subMonth(12), Carbon::now()]
        //         )
        //         ->groupBy('year', 'month')
        //         ->get();
        // });

        $orders = Order::selectRaw('year(created_at) year, month(created_at) month, count(*) count')
            ->whereBetween(
                'created_at',
                [Carbon::now()->subMonth(12), Carbon::now()]
            )
            ->groupBy('year', 'month')
            ->get();
        $ordersArr =  $orders->pluck("count");
        $totalOrders = $orders->sum('count');

        return view("client.dashboard", compact("orders", "ordersArr", "totalOrders"));
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
        // $plans = Plan::limit(2)->get();
        $plans = Plan::all();
        return view("client.pricing", compact("plans"));
    }

    /**
     * Display a settings page of the admin panel.
     *
     * @return \Illuminate\Http\Response
     */
    public function settings(Request $request)
    {
        $user = Auth::user();
        return view("client.settings", compact("user"));
    }

    /**
     * Display a settings page of the admin panel.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateSettings(UpdateSettingsRequest $request)
    {
        abort_if(!Auth::user(), \Illuminate\Http\Response::HTTP_NOT_FOUND, __("Not Found."));
        try {
            return redirect()->route("client.settings")->with([
                "success" => __("Settings successfully updated.")
            ]);
        } catch (\Exception $e) {
            return redirect()->route("client.settings")->withErrors([
                "warning" => $e->getMessage(),
            ]);
        }
        return $request->all();
    }

    /**
     * Display a profile page of the admin panel.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile(Request $request)
    {
        $user = Auth::user();
        return view("client.profile", compact("user"));
    }

    /**
     * Display a settings page of the admin panel.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(UpdateProfileRequest $request)
    {
        abort_if(!Auth::user(), \Illuminate\Http\Response::HTTP_NOT_FOUND, __("Not Found."));
        try {
            $user = Auth::user();
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->save();
            return redirect()->route("client.profile")->with([
                "success" => __("Profile successfully updated.")
            ]);
        } catch (\Exception $e) {
            return redirect()->route("client.profile")->withErrors([
                "warning" => $e->getMessage(),
            ]);
        }
        return $request->all();
    }


    /**
     * Display a chat page of the admin panel.
     *
     * @return \Illuminate\Http\Response
     */
    public function chat(Request $request)
    {
        $per_page = Cache::get('per_page', 50);
        $chats = Chat::where('user_id', "=", Auth::user()->id)->paginate($per_page)->onEachSide(1);
        return view("client.chat", compact("chats"));
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
