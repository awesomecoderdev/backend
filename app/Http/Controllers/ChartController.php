<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Response as JsonResponse;

class ChartController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function orders(Request $request)
    {
        abort_if(!Auth::user()->supperadmin(), \Illuminate\Http\Response::HTTP_UNAUTHORIZED, __("Unauthorized Access."));

        $cache_ttl = 5; // cache timer
        $orders = Cache::remember('orders_chart', 60 * $cache_ttl, function () {
            $orders_chart = Order::select(DB::raw('count(id) as `count`'), DB::raw("CONCAT_WS('-',DAY(created_at),MONTH(created_at),YEAR(created_at)) as date"))
                ->groupBy('date')
                ->orderBy("count")
                ->get();

            $orders_chart = $orders_chart->groupBy(function ($date) {
                return Carbon::parse($date->date)->format('m-Y');
            }, false)->toArray();

            return $orders_chart;
        });

        $startPoint = cache::remember("chart_start", 60 * $cache_ttl, function () {
            return Order::select('created_at')->orderBy('created_at', 'asc')->first();
        });

        return Response::json([
            "success" => true,
            'status'    => JsonResponse::HTTP_ACCEPTED,
            "message" => "Successfully Authorized.",
            "start" => $startPoint->created_at,
            "data" => $orders
        ], JsonResponse::HTTP_OK);
    }
}
