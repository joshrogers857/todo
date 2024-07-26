<?php

namespace App\Http\Controllers;

use App\Models\ToDoList;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ToDoListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $toDoLists = ToDoList::all();

        return response()->json($toDoLists, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): Response
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:30']
        ]);

        $data['user_id'] = 1; // TODO: replace with current user's id
        $toDoList = ToDoList::create($data);

        return response()->json($toDoList, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        $item = ToDoList::with('items')->findOrFail($id);

        return response()->json($item, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): Response
    {
        $toDoList = ToDoList::findOrFail($id);

        $data = $request->validate([
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'title' => ['required', 'string', 'max:30'],
        ]);

        $toDoList->update($data);

        return response()->json($toDoList, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): Response
    {
        $result = ToDoList::destroy($id);

        return response()->json($result, Response::HTTP_NO_CONTENT);
    }
}
