<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->role == 2)
            return redirect()->route('admin.dashboard');

        if ($user->role == 1) {
            $books = $user->books()->latest()->get();
            $categories = \App\Models\Category::all();
            // $orders = $user->sales();

            return view('seller.dashboard', compact('books', 'categories'));
        }

        // Default Customer Dashboard
        return view('dashboard');
    }
}
