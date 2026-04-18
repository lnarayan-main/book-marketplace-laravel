<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $categories = Category::all();
        $books = Book::all();
        $newBooks = Book::where('status', 'active')->latest()->limit(4)->get();
        return view("index", compact("categories", "books", 'newBooks'));
    }
}
