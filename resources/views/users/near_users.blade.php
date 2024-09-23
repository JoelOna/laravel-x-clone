<section class="border border-blue-600 w-full lg:w-96">
    Near users to you
    @foreach ($users as $near_user)
        @include('users.user',['user' => $near_user, 'follow_button' => true])
    @endforeach
</section>
