<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::latest()->get(); //to get evry todos from database and stored in todos 
        $user_todos = Todo::where("user_id", auth()->user()->id)->get(); //to get users todos only availbale in user_todos

        return view('home', compact('todos', 'user_todos'));
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
        $todo = new Todo(); //created an object for the model Todo named $todo
        $todo->title = $request->title;
        $todo->description = $request->description;
        $todo->user_id = auth()->id();
        $todo->is_completed = $request->boolean('is_completed');

        $todo->save();
        return redirect()->route('home');
    }

    public function details(Todo $todo)
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
        $todo->is_completed = $request->boolean('is_completed');

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
