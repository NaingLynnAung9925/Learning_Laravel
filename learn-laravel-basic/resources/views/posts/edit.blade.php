@extends('posts.layouts.app')

@section('context')
    <h2>Edit Post</h2>

    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}">
            @error('title')
                <div class="alert alert-danger w-25">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="body">Body</label>
            <input type="text" name="body" id="body" class="form-control" value="{{ $post->body }}">
            @error('body')
                <div class="alert alert-danger w-25">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control mb-3" value="{{ $post->image }}">
            @error('body')
                <div class="alert alert-danger w-25">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="categories">Categories</label>
            <select name="categories[]" id="categories" class="form-control" multiple>
                @foreach ($categories as $category)
                    <option> {{ $category->name }} </option>
                @endforeach
            </select>
        </div>
        <a href="{{ route('posts.index') }}" class="btn btn-dark">Back</a>
        <button class="btn btn-primary" type="submit">Update</button>
    </form>

@endsection