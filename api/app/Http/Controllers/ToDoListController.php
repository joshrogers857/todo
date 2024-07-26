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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
     * Show the form for editing the specified resource.
     */
    public function edit(ToDoList $toDoList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ToDoList $toDoList)
    {
        //
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
