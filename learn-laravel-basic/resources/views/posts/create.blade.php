@extends('posts.master')

@section('context')

<h2>Create Post</h2>

<form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control">
    </div>
    <div class="">
        <label for="body">Body</label>
        <input type="text" name="body" id="body" class="form-control">
    </div>
    <div class="">
        <label for="image">Image</label>
        <input type="file" name="image" id="image" class="form-control">
    </div>
    <div class="my-3">
        <a href="{{ route('categories.create') }}" class="btn btn-primary">Create Category</a>
    </div>
    <select name="categories[]" class="form-control" multiple>
        <option value="">Select Category</option>
        @foreach ($categories as $category)
            <option value="{{ $category->name }}">{{ $category->name }}</option>
        @endforeach
    </select>
    <button type="submit" class="btn btn-primary mt-3"> Create</button>
</form>

@endsection