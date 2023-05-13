<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Comment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $books = Book::query()->with('category')->latest()->paginate(9);

        return view('main', compact('books'));
    }

    public function show(Book $book)
    {
        $comments = Comment::query()->with(['book', 'user'])->where('book_id', $book->id)->latest()->get();
        $book = $book->load(['category', 'comments']);

        return view('admin.books.show', compact(['book', 'comments']));
    }
}
