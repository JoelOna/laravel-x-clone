@extends('layout.app')

@section('title')
    Home page
@endsection

@section('content')
    @if (session('message'))
        <div class="alert alert-info">
            {{ session('message') }}
        </div>
    @endif
    
    @include('post.create')
    @include('post.show')
    {{-- @include('users.near_users') --}}
@endsection
