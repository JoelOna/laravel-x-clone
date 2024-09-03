<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>X | @yield('title')</title>
    @yield('styles')
    @vite('resources/css/app.css')
</head>
<body>
    <body class="dark:bg-gray-800 dark:text-white">
        @include('layout._partials.side_bar')
        
        <div class="container mx-auto px-4 md:px-5 lg:px-20">
            @yield('content')
        </div>

        @include('layout._partials.footer')
    </body>
</body>
</html>