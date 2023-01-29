<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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
        // return Auth::user()->subscription($plan->name)->name;
        // return $plan;
        // $plan->meta = [
        //     "name" => "ibrahim",
        // ];
        // $plan->save();
        // return $timestamp = Auth::user()->subscription("Business Plan")->asStripeSubscription()->current_period_end;

        $intent = Auth::user()->createSetupIntent();
        $user = Auth::user();
        return view("client.plans.show", compact("plan", "intent", "user"));
    }

    /**
     * Process Payments.
     *
     * @param  App\Http\Requests\UpdatePlanRequest  $request
     * @param  \App\Models\Plan $plan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePlanRequest $request, Plan $plan)
    {
        try {
            DB::beginTransaction(); // start db

            // $subscriptions = Auth::user()->newSubscription(
            //     $plan->name,
            //     $plan->stripe_plan,
            // )->create($request->paymentMethod);

            // dd($subscriptions);

            // create order after payments

            DB::commit(); // end db

            return redirect()->route("client.subscriptions")->with([
                "success" => __("Your subscription has been successfully activated.")
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
