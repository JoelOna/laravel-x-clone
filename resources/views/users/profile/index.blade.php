@extends('layout.app')

@section('title')
    {{ $user->name }}
@endsection

@section('content')
    @if (session('message'))
        <div class="alert alert-info">
            {{ session('message') }}
        </div>
    @endif
    <div class="w-full h-72 overflow-hidden">
        <img src="{{$user->background_image}}" 
             alt="" class="w-full h-full object-cover">
    </div>
    <section class="px-12 pb-12 -mt-20">
        <div class="flex">
            <img src="{{ $user->user_img }}" class="rounded-full h-36 w-36 border border-white object-contain">
            <div class="flex flex-wrap">
                <div class="flex flex-col ml-4 place-content-center">
                    <label class="text-2xl">{{ $user->name }}</label>
                    <small>{{'@'.$user->user_name_x }}</small>
                </div>
                <div class="mx-4 place-content-center">
                    <follow-button :user_id="{{ Auth::id() ?? 0 }}" follower_id="{{ $user->id }}"
                        class="content-center" />
                </div>
            </div>
        </div>
        <section class="mt-8">
            <div class="flex flew-wrap">
                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-map-pin"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" /><path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z" /></svg>
                <label class="ml-2">{{$user->user_location}}</label>
            </div>
            <div class="flex flex-wrap mt-3">
                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-ballpen"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 6l7 7l-4 4" /><path d="M5.828 18.172a2.828 2.828 0 0 0 4 0l10.586 -10.586a2 2 0 0 0 0 -2.829l-1.171 -1.171a2 2 0 0 0 -2.829 0l-10.586 10.586a2.828 2.828 0 0 0 0 4z" /><path d="M4 20l1.768 -1.768" /></svg>
                <p class="ml-2">
                    {{$user->user_bio}}
                </p> 
            </div>
        </section>
    </section>

    <section class="border-t border-b">
        <div class="flex flex-wrap text-center p-2">
            <div class="flex-1 border-r text-blue-400" id="posts">
                Posts
            </div>
            <div class="flex-1 border-r" id="comments">
                Comments
            </div>
            <div class="flex-1" id="likes">
                Likes
            </div>
        </div>
    </section>
 
    <section class="block" id="posts-section">
        @include('post.show',['posts' => $user->posts])
    </section>
    <section class="hidden" id="comments-section">
        <post-comment :comments="{{$user->comments}}" :user="{{$user}}"/>
    </section>
    <section class="hidden" id="likes-section">
        @include('post.show',['posts' => $user->likes])
    </section>
@endsection
@push('scripts')
    <script>
        const handleClick = (showInfo, hideInfo, active, nonActive) => {
            const section = document.getElementById(showInfo)
            if (section.classList.contains('hidden')) {
                section.classList.remove('hidden')
                section.classList.add('block')
            }
            hideInfo.forEach(element => {
                const section = document.getElementById(element)
                section.classList.remove('block')

                if (!section.classList.contains('hidden')) {
                    section.classList.add('hidden')
                }

            });
            changeColor(active,nonActive)
        }

        const changeColor = (active, nonActive) => {
            if (!active.classList.contains('text-blue-400')) {
                active.classList.add('text-blue-400')
            }else{
                active.classList.remove('text-blue-400')
            }

            nonActive.forEach(element => {
                if (element.classList.contains('text-blue-400')) {
                    element.classList.remove('text-blue-400')
                }
            });
        }
        document.addEventListener("DOMContentLoaded", (event) => {
            const postsButton = document.getElementById('posts')
            const commentsButton = document.getElementById('comments')
            const likesButton = document.getElementById('likes')

            postsButton.addEventListener('click',() => handleClick('posts-section',['comments-section','likes-section'],postsButton,[commentsButton,likesButton]))
            commentsButton.addEventListener('click',() => handleClick('comments-section',['posts-section','likes-section'],commentsButton,[postsButton,likesButton]))
            likesButton.addEventListener('click',() => handleClick('likes-section',['comments-section','posts-section'],likesButton,[commentsButton,postsButton]))
        });
    </script>
@endpush