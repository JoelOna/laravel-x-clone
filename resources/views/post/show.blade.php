<div>
    @foreach ($posts as $post)
        <article class="border border-white mb-4">
            <section class="mt-4 p-4 flex flex-row align-content-center">
                <img src="{{$post->user->user_img}}" alt="" class="h-12 w-12">
                <div class="flex flex-col ml-4">
                    <label>{{$post->user->name}}</label>
                    <small>@ {{$post->user->user_name_x}}</small>
                </div>
                @include('post.components.follow_button', ['isPost' => true])
                @include('post.components.like', ['post' => $post])
            </section>
            <p class="p-4">{{$post->description}}</p>
        </article>
    @endforeach
</div>