<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return match ($user->role) {
            2 => redirect()->route('admin.dashboard'),
            1 => redirect()->route('seller.dashboard'),
            0 => redirect()->route('customer.dashboard'),
            default => redirect()->route('login'),
        };
    }
}
