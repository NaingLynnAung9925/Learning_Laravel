@extends('posts.layouts.app')
@section('context')


@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif


<table class="table table-info mt-5 table-striped table-hover">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Body</th>
        <th>Image</th>
        <th>Created_at</th>
        <th>Updated_at</th>
        <th>Operation</th>
    </tr>
    @foreach ($posts as $post)
        <tr>
            <td> {{ $post->id }} </td>
            <td> {{ $post->title }} </td>
            <td> {{ $post->body }} </td>
            <td> 
                 <img src="{{ asset( "storage".$post->image) }}" width="50" height="50">
            </td>
            <td> {{ $post->created_at->format('Y-m-d')}} </td>
            <td> {{ $post->updated_at->format('Y-m-d') }} </td>
            <td>
                <div class="dropdown">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Operation
                    </a>
                
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('posts.show', $post->id) }}" class="dropdown-item ">Show</a></li>
                        <li><a href="{{ route('posts.edit', $post->id) }}" class="dropdown-item">Edit</a></li>
                        <li>  
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger ms-2">Delete</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </td>

        </tr>
    @endforeach
    
</table>

<div >
    <a class="btn btn-primary" href="{{ route('posts.create') }}"> Create New Post</a>
</div>


@endsection