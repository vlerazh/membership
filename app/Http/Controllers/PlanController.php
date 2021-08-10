<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;
class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::all();
        return view('superadmin.plans.index', compact('plans'));
    }

    /**
     * Show the Plan.
     *
     * @return mixed
     */
    public function show(Plan $plan, Request $request)
    {   
        $paymentMethods = $request->user()->paymentMethods();

        $intent = $request->user()->createSetupIntent();
        
        return view('plans.show', compact('plan', 'intent'));
    }
}
