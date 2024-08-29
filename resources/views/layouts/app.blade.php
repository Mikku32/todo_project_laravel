<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo</title>
    @Vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-300">

    @auth
        <nav class="bg-slate-100 shadow-lg">
            <div class="flex justify-between items-center mb-4 py-3 px-4 ">

                <h1 class="text-md font-bold ">Welcome, {{ Auth::user()->name }}</h1>

                <form method="POST" action="{{ route('logout') }}" class="inline ">
                    @csrf
                    <button type="submit"
                        class="flex p-2 items-center justify-center bg-red-600  text-white text-xs font-bold rounded-lg">
                        Logout
                    </button>
                </form>
            </div>
        </nav>
    @endauth
    <main>
        <div class=" ">
            @yield('content')
        </div>
    </main>

</body>

</html>
