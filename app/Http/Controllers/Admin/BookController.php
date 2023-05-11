<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookStoreRequest;
use App\Http\Requests\BookUpdateRequest;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::query()->with('category')->latest()->get();

        return view('admin.books.index', compact('books'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.books.create', compact('categories'));
    }

    public function store(BookStoreRequest $request)
    {
        $data = $request->validated();
        $cover = $request->file('cover')->store('covers', 'public');

        Book::query()->create([
            'title' => $data['title'],
            'slug' => Str::slug($data['title']),
            'author' => $data['author'],
            'description' => $data['description'],
            'cover' => $cover,
            'category_id' => $data['category_id'],
        ]);

        return redirect()->route('books.index')->with('success', 'Книга добавлена');
    }

    public function edit(string $id)
    {
        $book = Book::query()->find($id);
        $categories = Category::all();

        return view('admin.books.edit', compact('book', 'id', 'categories'));
    }

    public function update(BookUpdateRequest $request, string $id)
    {
        $data = $request->validated();
        $book = Book::query()->find($id);

        if ($request->hasFile('cover')) {
            $path = '/public/' . $book->cover;
            Storage::delete($path);

            $cover = $request->file('cover')->store('covers', 'public');
        } else {
            $cover = $book->cover;
        }

        $book->update([
            'title' => $data['title'],
            'slug' => Str::slug($data['title']),
            'author' => $data['author'],
            'description' => $data['description'],
            'cover' => $cover,
            'category_id' => $data['category_id'],
        ]);

        return redirect()->route('books.index')->with('success', 'Книга изменена');
    }

    public function destroy(string $id)
    {
        $book = Book::query()->find($id);
        $book->delete();

        $path = '/public/' . $book->cover;
        Storage::delete($path);

        return redirect()->route('books.index')->with('success', 'Книга удалена');
    }
}
