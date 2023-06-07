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
        try {
            $category = Category::create($request->all());
            return ['message' => 'Successful'];
        } catch (Exception $e) {
            return response()->json(['message' => 'Something went wrong!', 'data' => []], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        try {
            return ['message' => 'Successful', 'data' => $category];
        } catch (Exception $e) {
            return response()->json(['message' => 'Something went wrong!'], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        try {
            $category->update($request->all());
            return ['message' => 'Updated successufl', 'data' => $category];
        } catch (Exception $e) {
            return response()->json(['message' => 'Something went wrong!'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();
            return ['message' => 'Deleted successful'];
        } catch (Exception $e) {
            return response()->json(['message' => 'Something went wrong!'], 500);
        }
    }
}
