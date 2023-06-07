<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $projects = Project::paginate(1);
            if (!empty($projects)) {
                foreach ($projects as $project) {
                    $project['tasks'] = $project->tasks;
                    $project['categories'] = $project->categories;
                }
                return ['message' => 'Successful', 'data' => $projects];
            } else {
                return response()->json(['messgae' => 'Data is empty!', 'data' => $projects], 400);
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
            $project = Project::create($request->all());
            return ['message' => 'Successful'];
        } catch (Exception $e) {
            return response()->json(['message' => 'Something went wrong'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        try {
            return ['message' => 'Successful', 'data' => $project];
        } catch (Exception $e) {
            return response()->json(['message' => "Something went wrong!"], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        try {
            $project->update($request->all());
            return ['message' => 'Updated successful', 'data' => $project];
        } catch (Exception $e) {
            return response()->json(['message' => "Something went wrong!"], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        try {
            $project->delete();
            return ['message' => 'Deleted Successfully'];
        } catch (Exception $e) {
            return response()->json(['message' => "Something went wrong!"], 500);
        }
    }
}
