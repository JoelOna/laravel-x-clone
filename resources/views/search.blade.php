@extends('layout.app')

@section('title')
    Search
@endsection

@section('content')
    @if (session('message'))
        <div class="alert alert-info">
            {{ session('message') }}
        </div>
    @endif
    <search-result :user_id="{{Auth::id() ?? 0}}" :users="{{$users}}" :posts="{{$posts}}" :comments="{{$comments}}"/>
    <div class="w-full text-center">
        <search-bar></search-bar>
    </div>
@endsection
