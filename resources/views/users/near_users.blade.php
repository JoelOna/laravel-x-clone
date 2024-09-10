<section class="border border-blue-600">
    Near users to you
    @foreach ($users as $near_user)
        <p>{{$near_user->name}}</p>
        @include('post.components.follow_button', ['isPost' => false])
    @endforeach
</section>