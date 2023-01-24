<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;
use Laravel\Cashier\Subscription;
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
        $plans = Plan::all();
        $subscriptions = Subscription::where("user_id", "=", Auth::user()->id)->orderBy("id", "DESC")->get();
        return view("client.subscriptions", compact("plans", "subscriptions"));
    }

    /**
     * Display a payment page of the admin panel.
     *
     * @return \Illuminate\Http\Response
     */
    public function payment(Request $request)
    {
        dd($request->all());

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
