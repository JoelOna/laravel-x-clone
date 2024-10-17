<section class="w-full lg:w-96">
    <label class="m-4">Close users</label>
    @include('users.user',['users' => $users, 'follow_button' => true, 'multiple' => true])
</section>
