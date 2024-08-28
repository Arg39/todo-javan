<?php

use App\Http\Controllers\TaskController;
use App\Models\tugas;
use Illuminate\Support\Facades\Route;

Route::get('/', [TaskController::class, 'index']);
Route::post('/todos', [TaskController::class, 'store'])->name('todos.store');
Route::delete('/todos/{todo}', [TaskController::class, 'destroy'])->name('todos.destroy'); 