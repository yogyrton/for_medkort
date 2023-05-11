<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $books = Book::query()->with('category')->latest()->paginate(9);

        return view('main', compact('books'));
    }
}
