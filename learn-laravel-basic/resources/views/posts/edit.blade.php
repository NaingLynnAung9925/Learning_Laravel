@extends('posts.master')

@section('context')

<h2>Update Post</h2>

<form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}">
    </div>
    <div class="">
        <label for="body">Body</label>
        <input type="text" name="body" id="body" class="form-control" value="{{ $post->body }}"> 
    </div>
    <div class="">
        <label for="image">Image</label>
        <input type="file" name="image" id="image" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary mt-3"> Update</button>
</form>

@endsection