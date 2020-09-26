<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        return view('todos.index');
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255'
        ]);
        Todo::create($request->all());
        return redirect()->back()->with('message', 'Todo created successfully');
    }

    public function edit()
    {
        return view('todos.edit');
    }
}
