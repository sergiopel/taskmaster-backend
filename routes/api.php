<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\TaskController;

Route::middleware('api')->group(function () {
    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('tasks', TaskController::class);
});
