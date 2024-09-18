<section class="border border-blue-600 w-full lg:w-96">
    Near users to you
    @foreach ($users as $near_user)
    <div class="flex flex-wrap">
        @include('users.user',['user' => $near_user])
        <follow-button :user_id="{{Auth::id() ?? 0}}" follower_id="{{$near_user->id}}" class="content-center"/>
    </div>
    @endforeach
</section>
