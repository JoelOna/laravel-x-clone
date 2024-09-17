@extends('dashboard.layout.main')

@section('content')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight m-4">
        Your posts
    </h2>
    <div class="m-4">
        @if (count($posts) > 0)
            @include('post.show', ['posts' => $posts])
        @else
            No post published yet!
        @endif
    </div>
@endsection
