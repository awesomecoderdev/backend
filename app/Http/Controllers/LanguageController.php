<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function change(Request $request)
    {
        if (isset($request->lang) && in_array($request->lang, config("app.available_locales"))) {
            App::setLocale(strtolower($request->lang));
            Session::put('locale', strtolower($request->lang));
        }

        return \Illuminate\Support\Facades\Response::json([
            "success" => true,
            'status'    => Response::HTTP_ACCEPTED,
            "message" => "Successfully Authorized.",
        ], Response::HTTP_OK);
    }
}
