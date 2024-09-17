<section class="border border-blue-600">
    Near users to you
    @foreach ($users as $near_user)
    <div class="flex flex-row flex-wrap">
        @include('users.user',['user' => $near_user])
        <follow-button :user_id="{{Auth::id() ?? 0}}" follower_id="{{$near_user->id}}" />
    </div>
    @endforeach
</section>