@extends('layouts.app')

@section('content')

<div class="py-8 px-4 min-h-screen bg-gradient-to-r from-violet-300 to-fuchsia-300">
    <div class="max-w-lg mx-auto p-6 rounded-lg bg-white shadow-md">
        <h1 class="text-3xl font-bold mb-4">{{ $todo->title }}</h1>

        <div class="mb-4">
            <label class="block text-lg font-medium text-gray-700">Description</label>
            <p class="text-gray-800 text-base">{{ $todo->description }}</p>
        </div>

        <div class="mb-6">
            <label class="block text-lg font-medium text-gray-700">Status</label>
            <p class="text-base {{ $todo->is_completed ? 'text-green-600' : 'text-red-600' }}">
                {{ $todo->is_completed ? 'Completed :)' : 'Not Completed :(' }}
            </p>
        </div>

        <div class="flex justify-end">
            <a href="{{ route('home') }}"
                class="px-4 py-2 bg-gradient-to-r from-violet-400 to-fuchsia-400 hover:from-violet-500 hover:to-fuchsia-500 text-white rounded-md shadow-sm">Back
                to Home</a>
        </div>
    </div>
</div>

@endsection