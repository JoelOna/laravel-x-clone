<div>
    @foreach ($posts as $post)
        <article class="border border-white mb-4">
            <section class="mt-4 p-4 flex flex-row align-content-center">
                <img src="{{$post->user->user_img}}" alt="" class="h-14 w-14">
                <div class="flex flex-col ml-4">
                    <label>{{$post->user->name}}</label>
                    <small>@ {{$post->user->user_name_x}}</small>
                </div>
                <div class="ps-4">
                    <follow-button :user_id="{{Auth::id() ?? 0}}" :follower_id="{{$post->user->id}}"></follow-button>
                </div>
            </section>
            <p class="p-4">{{$post->description}}</p>
            <like-button :user_id="{{Auth::id() ?? 0}}" :post="{{$post}}"></like-button>
        </article>
    @endforeach
</div>