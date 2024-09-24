<section class="border border-blue-600 w-full lg:w-96">
    Near users to you
    @include('users.user',['users' => $users, 'follow_button' => true, 'multiple' => true])
</section>
