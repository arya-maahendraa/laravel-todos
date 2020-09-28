<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoCreateRequest;
use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $todos = auth()->user()->todos->sortBy('completed');
        return view('todos.index', compact('todos'));
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store(TodoCreateRequest $request)
    {
        auth()->user()->todos()->create($request->all());
        return redirect(route('todo.index'))->with('message', 'Todo crete successfully');
    }

    public function edit(Todo $todo)
    {
        return view('todos.edit', compact('todo'));
    }

    public function update(TodoCreateRequest $request, Todo $todo)
    {
        $todo->update([
            'title' => $request->title
        ]);
        return redirect(route('todo.index'))->with('message', 'Todo updated successfully');
    }

    public function completed(Todo $todo)
    {
        $todo->update(['completed' => true]);
        return redirect(route('todo.index'))->with('message', 'Todo completed');
    }

    public function incomplete(Todo $todo)
    {
        $todo->update(['completed' => false]);
        return redirect(route('todo.index'))->with('message', 'Todo incompleted');
    }

    public function delete(Todo $todo)
    {
        $todo->delete();
        return redirect(route('todo.index'))->with('message', 'Todo deleted successfully');
    }
}
