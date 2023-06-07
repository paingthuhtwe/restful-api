<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ProjectController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\TaskController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('projects', ProjectController::class);

Route::resource('categories', CategoryController::class);

Route::resource('tasks', TaskController::class);
