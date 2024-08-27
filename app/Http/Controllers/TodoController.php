<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
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

        $todo->save();
        return redirect()->route('home');
    }
}
