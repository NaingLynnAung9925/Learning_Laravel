@extends('posts.master')

@section('context')
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control mb-2">
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection