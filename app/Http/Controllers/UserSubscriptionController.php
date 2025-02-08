<?php

namespace App\Http\Controllers;

use App\Models\UserSubscription;
use App\Models\User;
use App\Models\Package;
use App\Models\SubscriptionPlan;
use Illuminate\Http\Request;

class UserSubscriptionController extends Controller
{
    // Display a listing of the user subscriptions
    public function index()
    {
        $subscriptions = UserSubscription::with(['user', 'package', 'subscriptionPlan'])->get();
        return view('subscriptions.index', compact('subscriptions'));
    }

    // Show the form for creating a new user subscription
    public function create()
    {
        $users = User::all();
        $packages = Package::all();
        $plans = SubscriptionPlan::all();
        return view('subscriptions.create', compact('users', 'packages', 'plans'));
    }

    // Store a newly created user subscription in storage
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:users,id',
            'PackageID' => 'required|exists:packages,PackageID',
            'PlanID' => 'required|exists:subscription_plans,PlanID',
            'Status' => 'required|in:Active,Inactive,On Hold',
            'StartDate' => 'required|date',
            'EndDate' => 'required|date|after:StartDate',
        ]);

        UserSubscription::create($validatedData);

        return redirect()->route('subscriptions.index')->with('success', 'Subscription created successfully.');
    }

    // Display the specified user subscription
    public function show(UserSubscription $subscription)
    {
        return view('subscriptions.show', compact('subscription'));
    }

    // Show the form for editing the specified user subscription
    public function edit(UserSubscription $subscription)
    {
        $users = User::all();
        $packages = Package::all();
        $plans = SubscriptionPlan::all();
        return view('subscriptions.edit', compact('subscription', 'users', 'packages', 'plans'));
    }

    // Update the specified user subscription in storage
    public function update(Request $request, UserSubscription $subscription)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:users,id',
            'PackageID' => 'required|exists:packages,PackageID',
            'PlanID' => 'required|exists:subscription_plans,PlanID',
            'Status' => 'required|in:Active,Inactive,On Hold',
            'StartDate' => 'required|date',
            'EndDate' => 'required|date|after:StartDate',
        ]);

        $subscription->update($validatedData);

        return redirect()->route('subscriptions.index')->with('success', 'Subscription updated successfully.');
    }

    // Remove the specified user subscription from storage
    public function destroy(UserSubscription $subscription)
    {
        $subscription->delete();

        return redirect()->route('subscriptions.index')->with('success', 'Subscription deleted successfully.');
    }
}
