<div>
    @foreach ($posts as $post)
        <article class="border border-white mb-4">
            <p>{{$post->user->name}}</p>
            <p>{{$post->description}}</p>
        </article>
    @endforeach
</div>