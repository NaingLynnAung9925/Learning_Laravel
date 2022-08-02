@extends('posts.master')

@section('context')



<table class="table">
    <tr>
        <th></th>
        <th>ID</th>
        <th>Title</th>
        <th>Body</th>
        <th>Image</th>
        <th>Created_at</th>
        <th>Updated_at</th>
        
    </tr>
    @foreach ($posts as $post)
    <tr>
        <td>
            <a href="{{ route('posts.order', $post->id) }}" class="btn btn-info">Order</a>
        </td>
        <td>{{ $post->id }}</td>
        <td>{{ $post->title }}</td>
        <td>{{ $post->body }}</td>    
        <td>
            <img src="{{ asset('storage'.$post->image) }}" alt="" width="50" height="50">
        </td>
        <td>{{ $post->created_at->format('Y/m/d') }}</td>
        <td>{{ $post->updated_at->format('Y/m/d') }}</td>
        <td>
            <a href="{{ route('posts.show', $post->id) }}">Show</a>
            <a href="{{ route('posts.edit', $post->id) }}">Edit</a>
            <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
            </form>
        </td>
        
    </tr>
    @endforeach
   
</table>

<div class="">
    <a href="{{ route('posts.create') }}" class="btn btn-primary">Create Post</a>
</div>

@endsection