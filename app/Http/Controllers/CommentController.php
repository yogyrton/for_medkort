<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentStoreRequest;
use App\Models\Book;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function __construct()
    {
        return $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentStoreRequest $request, Book $book)
    {
        $data = $request->validated();

        Comment::query()->create([
            'text' => $data['text'],
            'book_id' => $book->id,
            'user_id' => \Auth::id(),
        ]);

        return back();
    }
}
