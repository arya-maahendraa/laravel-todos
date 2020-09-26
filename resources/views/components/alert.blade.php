<div>
    @if (session()->has('message'))
    <div class="py-4 px-4 bg-green-300">{{session()->get('message')}}</div>
    @elseif (session()->has('error'))
    <div class="py-4 px-4 bg-red-300">{{session()->get('error')}}</div>
    @endif

    @if ($errors->any())
    <div class="py-4 px-4 bg-red-300">
        <ul>
            @foreach ($errors->all() as $err)
            <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>