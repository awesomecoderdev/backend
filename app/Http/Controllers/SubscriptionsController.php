<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionsController extends Controller
{

    /**
     * Display a subscriptions page of the admin panel.
     *
     * @return \Illuminate\Http\Response
     */
    public function subscriptions(Request $request)
    {
        $intent = Auth::user()->createSetupIntent();

        return view("client.subscriptions", compact("intent"));
    }

    /**
     * Display a payment page of the admin panel.
     *
     * @return \Illuminate\Http\Response
     */
    public function payment(Request $request)
    {
        // dd($request->all());

        try {
            Auth::user()->newSubscription(
                'Plagiarism',
                $request->plan,
            )->create($request->paymentMethod);

            return redirect()->route("client.subscriptions")->with([
                "success" => __("Plan successfully created.")
            ]);
        } catch (\Exception $e) {
            dd($e);
            return redirect()->route("client.subscriptions")->withErrors([
                "warning" => $e->getMessage(),
            ]);
        }
    }
}
