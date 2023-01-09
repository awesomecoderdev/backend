<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Response as JsonResponse;

class FrontendController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Response::json([
            "success" => true,
            'status'    => JsonResponse::HTTP_OK,
            "message" => "Successfully Authorized.",
            "data" => null,
        ], JsonResponse::HTTP_OK);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function v1(Request $request)
    {
        return Response::json([
            "success" => true,
            'status'    => JsonResponse::HTTP_OK,
            "message" => "Successfully Authorized.",
            "version" => "v1",
            "data" => null,
        ], JsonResponse::HTTP_OK);
    }
}
