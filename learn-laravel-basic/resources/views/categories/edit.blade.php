@extends('categories.layouts.app')

@section('context')
    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="my-4">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $category->name }}">
            @error('name')
                <div class="alert alert-danger"> {{ $message }} </div>
            @enderror
        </div>
        <a href="{{ route('categories.index') }}" class="btn btn-dark">Back</a>
        <button class="btn btn-primary" type="submit">Update</button>
    </form>
@endsection