@extends('dashboard.layout.main')

@section('content')
<section class="p-6">
<div class="text-gray-900 dark:text-gray-100 text-2xl">
    Welcome {{$user->name}}!
 </div>
    <h2>
        Your likes
    </h2>
    <div class="p-6 text-gray-900 dark:text-gray-100">
        @if (count($likes) > 0)
            @include('post.show', ['posts' => $likes])
            <a href="{{route('dashboard.likes')}}">View more</a>
        @else
            No likes
        @endif
    </div>
    <h2>
        Your posts
    </h2>
    <div class="p-6 text-gray-900 dark:text-gray-100">
        @if (count($posts) > 0)
            @include('post.show', ['posts' => $posts])
            <a href="{{route('dashboard.posts')}}">View more</a>
        @else
            No posts published yet!
        @endif
    </div>
    <h2>
        Followers
    </h2>
    <div class="p-6 text-gray-900 dark:text-gray-100">
        @if (count($followers) > 0)
            @include('users.user', ['multiple' => true, 'users' => $followers])
            <a href="{{route('dashboard.followers')}}">View more</a>
        @else
            0 followers
        @endif
    </div>
    <h2>
        Following
    </h2>
    <div class="p-6 text-gray-900 dark:text-gray-100">
        @if (count($following) > 0)
            @include('users.user', ['multiple' => true, 'users' => $following])
            <a href="{{route('dashboard.following')}}">View more</a>
        @else
            0 following
        @endif
    </div>
</section>
@endsection
