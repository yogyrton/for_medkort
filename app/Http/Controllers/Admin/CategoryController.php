<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Support\Str;
use function GuzzleHttp\Promise\all;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::query()->latest()->get();

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(CategoryRequest $request)
    {
        $data = $request->validated();

        Category::query()->create([
            'title' => $data['title'],
            'slug' => Str::slug($data['title']),
        ]);

        return redirect()->route('categories.index')->with('success', 'Категория добавлена');
    }

    public function edit(string $id)
    {
        $category = Category::query()->find($id);

        return view('admin.categories.edit', compact('id', 'category'));
    }

    public function update(CategoryRequest $request, string $id)
    {
        $category = Category::query()->find($id);

        $category->update($request->all());

        return redirect()->route('categories.index')->with('success', 'Категория изменена');
    }

    public function destroy(string $id)
    {
        $category = Category::query()->find($id);

        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Категория удалена');
    }
}
