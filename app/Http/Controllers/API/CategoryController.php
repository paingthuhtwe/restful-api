<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $categories = Category::all();
            if (!empty($categories)) {
                return ['message' => 'Successful', 'data' => $categories];
            } else {
                return response()->json(['messgae' => 'Data is empty!', 'data' => $categories], 400);
            }
        } catch (Exception $e) {
            return response()->json(['message' => 'Something went wrong!', 'data' => []], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return Category::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return $category;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        return $category->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        return $category->delete();
    }
}
