<?php

use App\Http\Controllers\ToDoListController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// post
// put/patch
Route::get('/todos', [ToDoListController::class, 'index'])->name('todos.index');
Route::get('/todos/{id}', [ToDoListController::class, 'show'])->name('todos.show');
Route::delete('/todos/{id}', [ToDoListController::class, 'destroy'])->name('todos.destroy');
