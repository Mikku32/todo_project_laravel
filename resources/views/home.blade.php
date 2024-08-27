@extends('layouts.app')
@section('content')

<div class="  py-8 px-4 min-h-screen bg-slate-300">
    <div class="flex justify-between">
        <h1 class="text-4xl font-bold mb-4">Todos</h1>

    </div>
    <div class="flex flex-col gap-4 px-3 ">
        @foreach ($todos as $t)
            <div class="w-full rounded overflow-hidden shadow-lg bg-gradient-to-r from-violet-200 to-fuchsia-200">
                <div class="flex items-center px-6 pt-4">
                    <input type="checkbox" class="form-checkbox h-5 w-5 text-gray-600">
                    <div class="ml-6">
                        <div class="font-bold text-xl mb-1">{{ $t->title }}</div>
                        <p class="text-gray-700 text-base">{{ $t->description }}</p>
                    </div>
                </div>

                <div class="px-6  pb-2 flex justify-end">
                    <a href="" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                </div>
            </div>
        @endforeach

    </div>

</div>
@endsection