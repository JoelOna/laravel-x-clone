@if (isset($multiple) && $multiple)
    @foreach ($users as $user)
        <div>
            <section class="mt-4 p-4 flex flex-row align-content-center">
                <img src="{{$user->user_img}}" alt="" class="h-12 w-12 rounded-full object-contain border-gray-700">
                <div class="flex flex-col ml-4">
                    <label>{{$user->name}}</label>
                    <small>@ {{$user->user_name_x}}</small>
                </div>
            </section>
        </div>
    @endforeach  
@else
<div>
    <section class="mt-4 p-4 flex flex-row align-content-center">
        <img src="{{$user->user_img}}" alt="" class="h-12 w-12 rounded-full object-contain border border-gray-700">
        <div class="flex flex-col ml-4">
            <label>{{$user->name}}</label>
            <small>@ {{$user->user_name_x}}</small>
        </div>
    </section>
</div> 
@endif
