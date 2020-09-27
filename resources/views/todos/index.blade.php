@extends('todos.layout')

@section('content')
<div class="flex justify-center my-5">
   <h1 class="text-2xl">All your todos</h1>
   <a href="/todos/create" class="mx-5 py-2 px-1 bg-blue-300 cursor-pointer text-white rounded">Create New</a>
</div>
<hr>
<x-Alert></x-Alert>
<ul class="my-5">
   @foreach ($todos as $todo)
   <li class="flex justify-between p-2">
      @if ($todo->completed)
      <p class="line-through">{{$todo->title}}</p>
      @else
      <p>{{$todo->title}}</p>
      @endif
      <div>
         <a href="{{'/todos/'.$todo->id.'/edit'}}" class="text-orange-300 cursor-pointer">
            <i class="fas fa-edit px-2"></i>
         </a>
         @if ($todo->completed)
         <i class="fas fa-check text-green-400 px-2"></i>
         @else
         <i onclick="document.getElementById('form-complete-{{$todo->id}}').submit()"
            class="fas fa-check px-2 text-gray-300 cursor-pointer"></i>

         <form id="{{'form-complete-'.$todo->id}}" style="display: none" action="{{route('todo.completed', $todo->id)}}"
            method="post">
            @csrf
            @method('put')
         </form>
         @endif
      </div>
   </li>
   @endforeach
</ul>
@endsection