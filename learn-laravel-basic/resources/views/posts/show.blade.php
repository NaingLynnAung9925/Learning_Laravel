@extends('posts.layouts.app')

@section('context')
    <div class="my-4">
        <strong>Title : </strong> {{ $title }}
    </div>
    <div>
        <strong>Body : </strong> {{$body}}
    </div>
    <div class="mt-4">
        <strong>Image : </strong> 
        <img src="{{  asset($image)  }}" alt="" width="100" height="100">
    </div>
    <div class="mt-4">
        <a href="{{ route('posts.index') }}" class="btn btn-dark">Back</a>
    </div>
@endsection