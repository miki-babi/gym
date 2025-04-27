<?php

namespace App\Http\Controllers;

use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Show the dashboard view.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $users = User::all(); // Fetch all users
        return view('dashboard', compact('users'));
    }
}
