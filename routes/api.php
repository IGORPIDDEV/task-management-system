<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TaskController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\TeamController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/tasks', [TaskController::class, 'index']);
    Route::post('/tasks', [TaskController::class, 'store']);
    Route::get('/tasks/{id}', [TaskController::class, 'show']);
    Route::put('/tasks/{id}', [TaskController::class, 'update']);
    Route::delete('/tasks/{id}', [TaskController::class, 'destroy']);

    Route::post('/tasks/{taskId}/comments', [CommentController::class, 'store']);
    Route::get('/tasks/{taskId}/comments', [CommentController::class, 'index']);
    Route::delete('/comments/{id}', [CommentController::class, 'destroy']);

    Route::post('/teams', [TeamController::class, 'store']);
    Route::get('/teams', [TeamController::class, 'index']);
    Route::post('/teams/{teamId}/users', [TeamController::class, 'addUser']);
    Route::delete('/teams/{teamId}/users/{userId}', [TeamController::class, 'removeUser']);
});
