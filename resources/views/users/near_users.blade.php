<section class="border border-blue-600">
    Near users to you
    @foreach ($users as $user)
        <p>{{$user->name}}</p>
        @include('post.components.follow_button', ['isPost' => false])
    @endforeach
</section>