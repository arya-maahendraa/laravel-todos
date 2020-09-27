@extends('todos.layout')

@section('content')
<div class="flex justify-center my-5">
   <h1 class="text-2xl">All your todos</h1>
   <a href="/todos/create" class="mx-5 py-2 text-blue-300 cursor-pointer">
      <i class="fas fa-plus-circle"></i>
   </a>
</div>
<hr>
<x-Alert></x-Alert>
<ul class="my-5">
   @foreach ($todos as $todo)
   <li class="flex justify-between p-2">
      @include('todos.todo-complete-button')
      @if ($todo->completed)
      <p class="line-through">{{$todo->title}}</p>
      @else
      <p>{{$todo->title}}</p>
      @endif
      <div>
         <a href="{{'/todos/'.$todo->id.'/edit'}}" class="text-orange-300 cursor-pointer">
            <i class="fas fa-edit px-2"></i>
         </a>

         <i onclick="document.getElementById('form-delete-{{$todo->id}}').submit()"
            class="fas fa-trash px-2 text-red-300 cursor-pointer"></i>

         <form id="{{'form-delete-'.$todo->id}}" style="display: none" action="{{route('todo.delete', $todo->id)}}"
            method="post">
            @csrf
            @method('delete')
         </form>
      </div>
   </li>
   @endforeach
</ul>
@endsection