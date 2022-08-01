@extends('posts.master')

@section('context')

    <div class="">
        <strong> Title</strong> : {{ $post->title }}
    </div>
    <div class="my-5">
        <strong>Body</strong> : {{ $post->body }}
    </div>
    <div>
        <strong>Image</strong> : 
        <img src="{{ asset('storage'.$post->image) }}" alt="" width="100" height="100">
    </div>

    <div>
        <a href="{{ route('posts.index') }}" class="mt-5 btn btn-dark">Back</a>
    </div>

@endsection