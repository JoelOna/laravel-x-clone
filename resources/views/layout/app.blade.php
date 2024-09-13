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
    
    <div id="app"> <!-- Mueve el id="app" aquí -->
        <main class="container mx-auto px-4 md:px-44 lg:px-20 grid grid-cols-2">
            <div class="border border-red-500">
                @yield('content')
            </div>
            
            @include('users.near_users')
        </main>
    </div>
    
    @vite('resources/js/app.js')
    @include('layout._partials.footer')
</body>
</html>
