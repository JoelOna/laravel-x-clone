<x-app-layout>
    @include('dashboard.layout.menu')
    <div class="py-12">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg dark:text-gray-100">
               @yield('content')
            </div>
        </div>
    </div>
</x-app-layout>
