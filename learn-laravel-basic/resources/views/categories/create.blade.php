@extends('categories.layouts.app')

@section('context')
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="my-4">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control">
            @error('name')
                <div class="alert alert-danger"> {{ $message }} </div>
            @enderror
        </div>
        <button class="btn btn-primary" type="submit">Submit</button>
        
    </form>
@endsection