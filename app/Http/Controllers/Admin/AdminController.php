<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(Request $request){
        // returning total seller count, total customer count, total books count
        $sellerCount = User::where('role', 1)->count();
        $customerCount = User::where('role', 0)->count();
        $bookCount = Book::count();

        return view('admin.dashboard',compact('sellerCount','customerCount','bookCount'));
    }
}
