@if (isset($multiple) && $multiple)
    @foreach ($users as $user)
        <div>
            <section class="mt-4 p-4 flex flex-row align-content-center">
                <img src="{{$user->user_img}}" alt="" class="h-12 w-12 rounded-full object-contain border-gray-700">
                <div class="flex flex-wrap">
                    <div class="flex flex-col ml-4">
                        <label>{{$user->name}}</label>
                        <a href={{ route('user.index', ['user_name_x'=> $user->user_name_x]) }}>
                            <small>{{'@'.$user->user_name_x }}</small>
                        </a>
                    </div>
                    @if (isset($follow_button) && $follow_button)
                        <div class="mx-4 justify-center">
                            <follow-button :user_id="{{Auth::id() ?? 0}}" follower_id="{{$user->id}}" class="content-center"/>
                        </div>
                    @endif
                </div>
            </section>
        </div>
    @endforeach  
@else
<div>
    <section class="mt-4 p-4 flex flex-row align-content-center">
        <img src="{{$user->user_img}}" alt="" class="h-12 w-12 rounded-full object-contain border border-gray-700">
        <div class="flex flex-wrap">
            <div class="flex flex-col ml-4">
                <label>{{$user->name}}</label>
                <a href={{ route('user.index', ['user_name_x'=> $user->user_name_x]) }}>
                    <small>{{'@'.$user->user_name_x }}</small>
                </a>
            </div>
            @if (isset($follow_button) && $follow_button)
                <div class="mx-4 justify-center">
                    <follow-button :user_id="{{Auth::id() ?? 0}}" follower_id="{{$user->id}}" class="content-center"/>
                </div>
            @endif
        </div>
    </section>
</div> 
@endif
