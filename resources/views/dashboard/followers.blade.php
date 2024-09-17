@extends('dashboard.layout.main')

@section('content')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight m-4">
        Your followers
    </h2>
    <div class="m-4">
        @include('users.user', ['multiple' => true,'users' => $followers])
    </div>
@endsection
