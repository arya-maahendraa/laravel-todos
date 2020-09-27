<div>
    @if ($todo->completed)
    <i onclick="document.getElementById('form-incomplete-{{$todo->id}}').submit()"
        class="fas fa-check text-green-400 cursor-pointer px-2"></i>

    <form id="{{'form-incomplete-'.$todo->id}}" style="display: none" action="{{route('todo.incomplete', $todo->id)}}"
        method="post">
        @csrf
        @method('put')
    </form>

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