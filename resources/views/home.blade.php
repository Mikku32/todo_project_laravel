@extends('layouts.app')
@section('content')

<div class="  py-8  min-h-screen bg-slate-100">
    <h1 class="text-4xl font-bold mb-2">Todo</h1>
    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
        @foreach ($todos as $todo)
            <div class="max-w-sm rounded overflow-hidden shadow-lg bg-gradient-to-r from-violet-200 to-fuchsia-200">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">{{ $todo->title }}</div>
                    <p class="text-gray-700 text-base">{{ $todo->description }}</p>
                </div>

                <div class="px-6 pt-4 pb-2 flex justify-end">
                    <a href="" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection