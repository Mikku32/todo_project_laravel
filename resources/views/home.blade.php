@extends('layouts.app')
@section('content')
    <div class=" px-4 min-h-screen bg-slate-300 pb-12">

        <div class="flex px-3 items-center justify-between">

            <h1 class="text-4xl font-bold mb-4">Todos</h1>

            <div>
                <a href="{{ route('todosCreate') }}"
                    class="flex  h-10 w-10 items-center justify-center bg-gradient-to-r from-violet-300 to-fuchsia-300 hover:from-violet-500 hover:to-fuchsia-500 text-black text-lg  font-bold rounded-2xl">+</a>


            </div>
        </div>
        <div class="flex flex-col gap-4 px-3 mt-6">
            @foreach ($todos as $t)
                <div
                    class="flex flex-col  w-full rounded-xl py-2 overflow-hidden shadow-lg bg-gradient-to-r from-violet-200 to-fuchsia-200 hover:from-violet-400 hover:to-fuchsia-400">
                    <div class="flex flex-col px-6 pt-4">
                        <div class="flex gap-3 items-center mb-2">
                            <div>
                                <div class=" h-3 w-3 rounded-full {{ $t->is_completed ? 'bg-green-600' : 'bg-red-600' }}">
                                </div>
                            </div>
                            <a href="{{ route('todoDetails', ['todo' => $t->id]) }}"
                                class="font-bold text-xl ">{{ $t->title }}</a>
                        </div>
                        <p class="text-gray-700 text-base">{{ $t->description }}</p>
                    </div>
                    <div class="py-4 px-6 justify-between items-center flex sm:gap-3 sm:flex-row sm:justify-end">
                        <div class="bg-green-400 px-3 py-1 rounded-lg">
                            <a href="{{ route('todoUpdate', ['todo' => $t->id]) }}"
                                class="text-black-700  hover:text-blue-900 hover:underline font-semibold ">Edit</a>
                        </div>
                        <div type="button" onclick="showConfirmationDialog({{ $t->id }})"
                            class="text-red-700 px-4 bg-black   hover:text-red-900 hover:underline font-semibold  py-1 rounded-lg">
                            Delete</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Custom Confirmation Dialog -->
    <div id="confirmationDialog" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 hidden">
        <div class="bg-white rounded-lg p-6 max-w-sm w-full">
            <h3 class="text-lg font-semibold text-gray-800">Are you sure?</h3>
            <p class="text-gray-600 mt-2">Do you really want to delete this todo? This process cannot be undone.</p>
            <div class="mt-4 flex justify-end gap-2">
                <button onclick="hideConfirmationDialog()"
                    class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Cancel</button>
                <form id="deleteForm" method="POST" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Delete</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function showConfirmationDialog(todoId) {
            // Set the form action dynamically
            const form = document.getElementById('deleteForm');
            form.action = `/todos/${todoId}/delete`;

            // Show the dialog
            document.getElementById('confirmationDialog').classList.remove('hidden');
        }

        function hideConfirmationDialog() {
            // Hide the dialog
            document.getElementById('confirmationDialog').classList.add('hidden');
        }
    </script>
@endsection
