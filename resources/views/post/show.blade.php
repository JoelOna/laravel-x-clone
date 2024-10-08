<div>
    @foreach ($posts as $post)
        <article class="border">
            @include('users.user',['user' => $post->user,'follow_button' => true])
            <p class="p-4">{!!$post->description!!}</p>
            <section class="flex flex-wrap justify-center border-t">
                <div class="flex-1 border-r">
                    <like-button :user_id="{{Auth::id() ?? 0}}" :post="{{$post}}"></like-button>
                </div>
                <div class="flex-1">
                    <comment-button :user_id="{{Auth::id() ?? 0}}" :post_id="{{$post->id}}" />                
                </div>
            </section>
        </article>
    @endforeach
</div>