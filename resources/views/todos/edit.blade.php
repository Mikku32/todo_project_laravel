@extends('layouts.vitelayout')

@section('content')
    <div class="py-8 px-4 min-h-screen bg-gradient-to-r from-violet-300 to-fuchsia-300">
        <div class="items-center justify-center flex">
            <h1 class="text-4xl font-bold mb-4">Edit Your Todos</h1>
        </div>

        <div class="max-w-lg mx-auto mt-12 p-6 rounded-lg bg-slate-100 shadow-md">
            <form method="POST" action="{{ route('todoUpdateStore', $todo->id) }}">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="title" class="block text-lg font-medium text-gray-700">Title</label>
                    <input type="text" name="title" id="title" placeholder="Title please"
                        value="{{ $todo->title }}"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-indigo-200 focus:border-indigo-300">
                    @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="description" class="block text-lg font-medium text-gray-700">Description</label>
                    <textarea name="description" id="description" rows="4" placeholder="Description please..."
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-indigo-200 focus:border-indigo-300">{{ $todo->description }}
                </textarea>
                    @error('description')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6 flex items-center">
                    <input type="checkbox" name="is_completed" id="is_completed"
                        class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                        {{ $todo->is_completed ? 'checked' : '' }}>
                    <label for="is_completed" class="ml-2 block text-lg font-medium text-gray-700">Completed?</label>
                </div>

                <div class="flex justify-between">
                    <a href="{{ route('home') }}"
                        class="px-4 py-2 bg-gradient-to-r from-violet-400 to-fuchsia-400 hover:from-violet-500 hover:to-fuchsia-500 text-black font-bold rounded-md shadow-sm">Back
                        to Home</a>
                    <button type="submit"
                        class="px-4 py-2 bg-gradient-to-r from-violet-400 to-fuchsia-400 hover:from-violet-500 hover:to-fuchsia-500 text-black font-bold rounded-md shadow-sm">
                        Edit Todo
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
