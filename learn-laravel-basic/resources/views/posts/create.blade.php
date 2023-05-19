@extends('posts.layouts.app')


@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif


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
        <div class="form-group my-3">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control">
            @error('image')
            <div class="alert alert-danger w-25">{{ $message }}</div>
         @enderror
        </div>
        
        <div class="form-group mb-3">
            <label for="categories">Categories</label>
            <select name="categories[]" id="categories" class="form-control" multiple >
                <option value="">Select Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->name }}"> {{ $category->name }} </option>
                    @endforeach
            </select>
        </div>
        <button class="btn btn-primary" type="submit">Create Post</button>
        
            <a href="{{ route('categories.create') }}" class="btn btn-primary">Add Category</a>

    </form>

@endsection