@extends('todos.layout')

@section('content')
<h1 class="text-2xl">Update to do</h1>
<hr>
<x-Alert></x-Alert>
<form action="{{ route('todo.update', ['todo'=>$todo->id]) }}" method="POST" class="py-5">
   @csrf
   @method('patch')
   <input type="text" name="title" class="py-2 px-2 border rounded-lg" value="{{$todo->title}}">
   <input type="submit" value="update" class="p-2 border rounded-lg">
</form>

<a href="/todos" class="m-5 py-1 px-1 bg-white-300 cursor-pointer rounded">back</a>
@endsection