<?php

use App\Http\Controllers\ToDoListController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/todos', [ToDoListController::class, 'store'])->name('todolist.store');
Route::get('/todos', [ToDoListController::class, 'index'])->name('todolist.index');
Route::get('/todos/{id}', [ToDoListController::class, 'show'])->name('todolist.show');
Route::put('/todos/{id}', [ToDoListController::class, 'update'])->name('todolist.update');
Route::delete('/todos/{id}', [ToDoListController::class, 'destroy'])->name('todolist.destroy');
