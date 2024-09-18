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
    <div class="w-full text-center">
        @include('post.create')
    </div>
    <div class="px-10">
        @include('post.show')
    </div>
@endsection
