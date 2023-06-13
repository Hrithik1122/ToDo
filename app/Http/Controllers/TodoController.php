<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todo = Todo::all();
        return view('todo.index', compact('todo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('todo/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $todo = new Todo;
        $todo->title = $request->input('title');
        $todo->description = $request->input('description');
        $todo->due_date = $request->input('due_date');
        $todo->status = $request->input('status');
        $todo->save();

        return redirect('todo')->with('status','ToDo Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todos, $id)
    {
        $todos = Todo::find($id);
        return view('todo/view', compact('todos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todo $todos, $id)
    {   
        $todos = Todo::find($id);
        return view('todo/edit', compact('todos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $todos = Todo::find($id);
        $todos->title = $request->input('title');
        $todos->description = $request->input('description');
        $todos->due_date = $request->input('due_date');
        $todos->status = $request->input('status');
        $todos->update();

        return redirect('/todo')->with('status','ToDo Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todos, $id)
    {
        // dd($id);
        $todos = Todo::find($id);
        $todos->delete();
        return redirect('/todo')->with('status','ToDo Deleted Successfully');
    }
}
