@extends('categories.layouts.app')

@section('context')
    <div class="">
        <strong>Name :</strong> {{ $category->name }}
    </div>
    <a href="{{ route("categories.index") }}" class="btn btn-dark">Back</a>
@endsection