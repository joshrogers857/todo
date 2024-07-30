<?php

namespace App\Http\Controllers;

use App\Models\ToDoItem;
use App\Models\ToDoList;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ToDoItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $toDoListId): Response
    {
        $toDoList = ToDoList::findOrFail($toDoListId);

        $toDoItems = $toDoList->items()->get();

        return response()->json($toDoItems, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $toDoListId): Response
    {
        if (!ToDoList::where("id", $toDoListId)->exists()) {
            return response()->json(['error' => 'ToDoList not found'], Response::HTTP_NOT_FOUND);
        }

        $data = $request->validate([
            "content" => ["required", "string", "max:200"],
            "is_complete" => ["required", "boolean"],
        ]);

        $data["to_do_list_id"] = $toDoListId;
        $toDoItem = ToDoItem::create($data);

        return response()->json($toDoItem, Response::HTTP_CREATED);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $listId, string $itemId): Response
    {
        $toDoItem = ToDoItem::findOrFail($itemId);

        $data = $request->validate([
            "to_do_list_id" => ["required", "int", "exists:to_do_lists,id"],
            "content" => ["required", "string", "max:200"],
            "is_complete" => ["required", "boolean"],
        ]);

        $toDoItem->update($data);

        return response()->json($toDoItem, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $listId, string $itemId): Response
    {
        $result = ToDoItem::destroy($itemId);

        return request()->json($result, Response::HTTP_NO_CONTENT);
    }
}
