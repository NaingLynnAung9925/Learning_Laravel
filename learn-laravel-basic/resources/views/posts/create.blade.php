@extends('posts.layouts.app')
@section('context')

    <h2>New Post</h2>

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control">
            @error('title')
                <div class="alert alert-danger w-25">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="body">Body</label>
            <input type="text" name="body" id="body" class="form-control">
            @error('body')
            <div class="alert alert-danger w-25">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control">
            @error('image')
            <div class="alert alert-danger w-25">{{ $message }}</div>
         @enderror
        </div>
        <button class="btn btn-primary" type="submit">Create</button>
    </form>

@endsection