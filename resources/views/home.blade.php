@extends('layouts.app')
@section('content')

<div class="  py-8 px-4 min-h-screen bg-slate-300 pb-12">
    <div class=" flex  items-center justify-between">
        <h1 class="text-4xl font-bold mb-4">Todos</h1>
        <div>
            <a href="{{ route('todosCreate') }}"
                class="flex mr-4 h-10 w-10 items-center justify-center bg-gradient-to-r from-violet-300 to-fuchsia-300 hover:from-violet-500 hover:to-fuchsia-500 text-white font-bold   rounded-2xl">+</a>
        </div>

    </div>
    <div class="flex flex-col gap-4 px-3 mt-6 ">
        @foreach ($todos as $t)
            <div onclick="window.location='{{ route('todoDetails', ['todo' => $t->id]) }}'"
                class="flex justify-between items-center w-full rounded-xl py-2 overflow-hidden shadow-lg bg-gradient-to-r from-violet-200 to-fuchsia-200 hover:from-violet-400 hover:to-fuchsia-400">
                <div class="flex items-center px-6 pt-4">
                    <input type="checkbox" class="form-checkbox h-5 w-5 text-gray-600" {{ $t->is_completed ? 'checked' : '' }}>
                    <div class="ml-6">
                        <div class="font-bold text-xl mb-1">{{ $t->title }}</div>
                        <p class="text-gray-700 text-base">{{ $t->description }}</p>
                    </div>
                </div>

                <div class="py-4  items-center flex flex-col sm:flex-row justify-end">
                    <a href="{{ route('todoUpdate', ['todo' => $t->id]) }}"
                        class="text-blue-700  h-9 hover:text-blue-900 hover:underline font-semibold  py-2 rounded">Edit</a>
                    <form action="{{ route('todoDelete', ['todo' => $t->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="text-red-700 px-4 h-9 hover:text-red-900 hover:underline font-semibold  sm:py-2 rounded">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach

    </div>

</div>
@endsection