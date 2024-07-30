<?php

use App\Http\Controllers\ToDoListController;
use App\Http\Controllers\ToDoItemController;
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

Route::post('/todos/{id}/items', [ToDoItemController::class, 'store'])->name('todoitem.store');
Route::get('/todos/{id}/items', [ToDoItemController::class, 'index'])->name('todoitem.index');
Route::put('/todos/{listId}/items/{itemId}', [ToDoItemController::class,'update'])->name('todoitem.update');
Route::delete('/todos/{listId}/items/{itemId}', [ToDoItemController::class, 'destroy'])->name('todoitem.destroy');
