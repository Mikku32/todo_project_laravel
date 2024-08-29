@extends('layouts.app')


@section('content')
    <div
        class="flex items-center justify-center min-h-screen w-full bg-gradient-to-r from-indigo-300 via-purple-300 to-red-400">

        <div class="px-8 py-6 mx-4 sm:mx-0 mt-4  bg-white rounded-lg shadow-md w-full sm:w-[50%]">
            <h1 class="text-2xl text-center font-bold text-gray-900">Register</h1>
            <form class="mt-6 space-y-6" method="POST" action="{{ route('registerStore') }}">
                @csrf
                <div>
                    <label for="name" class="block text-sm  font-serif font-semibold leading-6 text-gray-900">Name</label>
                    <div class="mt-2">
                        <input id="name" name="name" type="text" required
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" />
                        @error('name')
                            <span class="text-red-400">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div>
                    <label for="email"
                        class="block text-sm font-serif font-semibold leading-6 text-gray-900">Email</label>
                    <div class="mt-2">
                        <input id="email" name="email" type="email" value="{{ old('email') }}" required
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" />
                        @error('email')
                            <span class="text-red-400">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div>
                    <label for="password"
                        class="block text-sm font-serif font-semibold leading-6 text-gray-900">Password</label>
                    <div class="mt-2">
                        <input id="password" name="password" type="password" required
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" />
                        @error('password')
                            <span class="text-red-400">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div>
                    <label for="password_confirmation"
                        class="block text-sm font-serif font-semibold leading-6 text-gray-900">Confirm Password</label>
                    <div class="mt-2">
                        <input id="password_confirmation" name="password_confirmation" type="password" required
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" />
                        @error('password')
                            <span class="text-red-400">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mt-6 flex justify-between items-center">
                    <a href="{{ route('login') }}"
                        class="p-2 text-blue-600 font-sans text-sm underline hover:text-blue-800">Go back</a>
                    <button type="submit"
                        class="flex items-center justify-center w-[75%] px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
