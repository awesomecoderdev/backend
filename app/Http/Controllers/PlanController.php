<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePlanRequest;
use App\Http\Requests\UpdatePlanRequest;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $plans = Plan::all();
        return view("client.plans.index", compact("plans"));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function show(Plan $plan)
    {
        // $plan->meta = [
        //     "name" => "ibrahim",
        // ];
        // $plan->save();

        $intent = Auth::user()->createSetupIntent();
        $user = Auth::user();
        return view("client.plans.show", compact("plan", "intent", "user"));
    }

    /**
     * Process Payments.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Plan $plan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plan $plan)
    {
        try {
            DB::beginTransaction(); // start db

            Auth::user()->newSubscription(
                $plan->name,
                $plan->stripe_plan,
            )->create($request->paymentMethod);

            // create order after payments

            DB::commit(); // end db

            return redirect()->route("client.subscriptions")->with([
                "success" => __("Plan successfully created.")
            ]);
        } catch (\Exception $e) {
            DB::rollback(); // rollback db

            dd($e);

            return redirect()->route("client.subscriptions")->withErrors([
                "warning" => $e->getMessage(),
            ]);
        }
    }
}
