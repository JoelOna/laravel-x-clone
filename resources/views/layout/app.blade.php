<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>X | @yield('title')</title>
    @yield('styles')
    @stack('scripts')
    @vite('resources/css/app.css')
</head>
<body class="dark:bg-black dark:text-white">
    @include('layout._partials.side_bar')
    
    <div id="app">
        <main class="overflow-x-hidden md:ms-60 lg:ms-96 px-0 border border-green-500 grid grid-cols-1 md:grid-cols-[3fr_1fr]">
            <div class="border border-red-500 md:w-11/12">
                @yield('content')
            </div>
            <div class="border border-blue-600  md:w-3/12 md:justify-self-end fixed right-0 left-0">
                @include('users.near_users')
            </div>
        </main>
    </div>
    <div id="modals"></div>
    @vite('resources/js/app.js')
    @include('layout._partials.footer')
</body>
</html>
