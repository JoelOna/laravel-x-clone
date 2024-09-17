<x-slot name="header">
    <a href="{{route('dashboard.index')}}">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </a>
        <div class="max-w-screen-xl px-4 py-3 mx-auto">
            <div class="flex items-center">
                <ul class="flex flex-row font-medium mt-0 space-x-8 rtl:space-x-reverse text-sm">
                    <li>
                        <a href="{{route('dashboard.likes')}}" class="text-gray-900 dark:text-white hover:underline" aria-current="page">Likes</a>
                    </li>
                    <li>
                        <a href="{{route('dashboard.posts')}}" class="text-gray-900 dark:text-white hover:underline">Posts</a>
                    </li>
                    <li>
                        <a href="{{route('dashboard.following')}}" class="text-gray-900 dark:text-white hover:underline">Following</a>
                    </li>
                    <li>
                        <a href="{{route('dashboard.followers')}}"" class="text-gray-900 dark:text-white hover:underline">Followers</a>
                    </li>
                </ul>
            </div>
        </div>
</x-slot>