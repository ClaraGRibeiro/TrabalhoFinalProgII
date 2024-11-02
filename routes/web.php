<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;

Route::get('/', [TaskController::class, 'index']);
Route::get('/about', [TaskController::class, 'about']);

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    Route::get('/dashboard', [TaskController::class, 'dashboard']);
    route::get('/tasks/create', [TaskController::class, 'create']);
    Route::post('/tasks', [TaskController::class, 'store']);
    Route::get('/tasks/{id}/seemore', [TaskController::class, 'show']);
    Route::delete('/tasks/{id}', [TaskController::class, 'destroy']);
    Route::delete('/account', [UserController::class, 'destroy']);
});
