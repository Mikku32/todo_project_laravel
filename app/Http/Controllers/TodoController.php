<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::latest()->get();

        return view('home', compact('todos'));
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        $todo = new Todo();
        $todo->title = $request->title;
        $todo->description = $request->description;
        $todo->is_completed = $request->boolean('is_completed');

        $todo->save();
        return redirect()->route('home');
    }

    public function details(Request $request, Todo $todo)
    {

        return view('todos.details', compact('todo'));
    }
    public function edit(Request $request, Todo $todo)
    {
        return view('todos.edit', compact('todo'));
    }




    public function update(Request $request, Todo $todo)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required'

        ]);
        $todo->is_completed = $request->boolean('is_completed', false);

        $todo->update($request->only(['title', 'description']));

        $todo->save();
        return redirect()->route('home');
    }


    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect()->route('home');
    }
}
