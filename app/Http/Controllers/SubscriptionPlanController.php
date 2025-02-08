<?php

namespace App\Http\Controllers;

use App\Models\SubscriptionPlan;
use App\Models\Package;
use Illuminate\Http\Request;

class SubscriptionPlanController extends Controller
{
    // Display a listing of the subscription plans
    public function index()
    {
        $plans = SubscriptionPlan::with('package')->get();
        return view('subscription_plans.index', compact('plans'));
    }

    // Show the form for creating a new subscription plan
    public function create()
    {
        $packages = Package::all();
        return view('subscription_plans.create', compact('packages'));
    }

    // Store a newly created subscription plan in storage
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'PackageID' => 'required|exists:packages,PackageID',
            'DurationInMonths' => 'required|integer|min:1',
            'Price' => 'required|numeric|min:0',
            'DiscountPercentage' => 'nullable|numeric|min:0|max:100',
        ]);

        SubscriptionPlan::create($validatedData);

        return redirect()->route('subscription_plans.index')->with('success', 'Subscription plan created successfully.');
    }

    // Display the specified subscription plan
    public function show(SubscriptionPlan $subscriptionPlan)
    {
        return view('subscription_plans.show', compact('subscriptionPlan'));
    }

    // Show the form for editing the specified subscription plan
    public function edit(SubscriptionPlan $subscriptionPlan)
    {
        $packages = Package::all();
        return view('subscription_plans.edit', compact('subscriptionPlan', 'packages'));
    }

    // Update the specified subscription plan in storage
    public function update(Request $request, SubscriptionPlan $subscriptionPlan)
    {
        $validatedData = $request->validate([
            'PackageID' => 'required|exists:packages,PackageID',
            'DurationInMonths' => 'required|integer|min:1',
            'Price' => 'required|numeric|min:0',
            'DiscountPercentage' => 'nullable|numeric|min:0|max:100',
        ]);

        $subscriptionPlan->update($validatedData);

        return redirect()->route('subscription_plans.index')->with('success', 'Subscription plan updated successfully.');
    }

    // Remove the specified subscription plan from storage
    public function destroy(SubscriptionPlan $subscriptionPlan)
    {
        $subscriptionPlan->delete();

        return redirect()->route('subscription_plans.index')->with('success', 'Subscription plan deleted successfully.');
    }
}
