<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();

        return response()->json([
            'status' => true,
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = \Validator::make($data, [
            'title' => 'required|string|min:3|max:100'
        ]);


        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ])->setStatusCode(422, 'Category was not created');
        }

        $category = Category::query()->create([
            'title' => $data['title'],
            'slug' => Str::slug($data['title'])
        ]);

        return response()->json([
            'status' => true,
            'category' => $category
        ])->setStatusCode(201, 'Category was created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::query()->find($id);

        if (!$category) {
            return response()->json([
                'status' => false,
                'message' => 'Category not found'
            ])->setStatusCode(404, 'Category not found');
        }

        return response()->json([
            'status' => true,
            'category' => $category,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::query()->find($id);

        if (!$category) {
            return response()->json([
                'status' => false,
                'message' => 'Category not found',
            ])->setStatusCode(404, 'Category not found');
        }

        $category->delete();

        return response()->json([
            'status' => true,
            'message' => 'Category was deleted',
        ]);
    }
}
