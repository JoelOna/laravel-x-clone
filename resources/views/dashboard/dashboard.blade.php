@extends('dashboard.layout.main')

@section('content')
<div class="p-6 text-gray-900 dark:text-gray-100">
    Welcome {{$user->name}}!
 </div>
    <h2>
        Your likes
    </h2>
    <div class="p-6 text-gray-900 dark:text-gray-100">
        @if (count($likes) > 0)
            @include('post.show', ['posts' => $likes])
        @else
            No likes
        @endif
        <a href="{{route('dashboard.likes')}}">View more</a>
    </div>
    <h2>
        Your posts
    </h2>
    <div class="p-6 text-gray-900 dark:text-gray-100">
        @if (count($posts) > 0)
            @include('post.show', ['posts' => $posts])
        @else
            No posts published
        @endif
        <a href="{{route('dashboard.posts')}}">View more</a>
    </div>
    <h2>
        Your followers
    </h2>
    <div class="p-6 text-gray-900 dark:text-gray-100">
        @if (count($followers) > 0)
            @include('users.user', ['multiple' => true, 'users' => $followers])
        @else
            No followers
        @endif
        <a href="{{route('dashboard.followers')}}">View more</a>
    </div>
    <h2>
        You are following
    </h2>
    <div class="p-6 text-gray-900 dark:text-gray-100">
        @if (count($following) > 0)
            @include('users.user', ['multiple' => true, 'users' => $following])
        @else
            No following
        @endif
        <a href="{{route('dashboard.following')}}">View more</a>
    </div>
@endsection
