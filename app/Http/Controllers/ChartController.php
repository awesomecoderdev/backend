<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

        $orders = Order::where("user_id", 1)->select(DB::raw('count(id) as `count`'), DB::raw("CONCAT_WS('-',DAY(created_at),MONTH(created_at),YEAR(created_at)) as date"))
            ->groupBy('date')
            ->orderBy("count")
            ->get();

        $orders = $orders->groupBy(function ($date) {
            return Carbon::parse($date->date)->format('F Y');
        }, false)->toArray();

        $orders = array_chunk($orders, 1, true);

        return Response::json([
            "success" => true,
            'status'    => JsonResponse::HTTP_ACCEPTED,
            "message" => "Successfully Authorized.",
            "data" => $orders
        ], JsonResponse::HTTP_OK);
    }
}
