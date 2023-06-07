<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $tasks = Task::all();
            if (!empty($tasks)) {
                return ['message' => 'Successful', 'data' => $tasks];
            } else {
                return response()->json(['messgae' => 'Data is empty!', 'data' => $tasks], 400);
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
            $task = Task::create($request->all());
            return ['message' => 'Successful'];
        } catch (Exception $e) {
            return response()->json(['message' => 'Something went wrong!'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        try {
            return ['message' => 'Successful', 'data' => $task];
        } catch (Exception $e) {
            return response()->json(['message' => "Something went wrong!"], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        try {
            $task->update($request->all());
            return ['message' => 'Updated successful', 'data' => $task];
        } catch (Exception $e) {
            return response()->json(['message' => "Something went wrong!"], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        try {
            $project->delete();
            return ['message' => 'Deleted Successfully'];
        } catch (Exception $e) {
            return response()->json(['message' => "Something went wrong!"], 500);
        }
    }
}
