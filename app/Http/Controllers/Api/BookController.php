<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::query()->with('comments')->latest()->get();

        return response()->json([
            'status' => true,
            'books' => $books
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::query()->with('comments')->find($id);

        if (!$book) {
            return response([
                'status' => false,
                'message' => 'Book not found'
            ])->setStatusCode(404, 'Book not found');
        }

        return response()->json([
            'status' => true,
            'book' => $book
        ]);
    }
}
