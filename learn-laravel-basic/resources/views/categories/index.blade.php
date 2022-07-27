@extends('categories.layouts.app')

@section('context')

@if ($message = Session::get('success'))
    <div class="alert alert-info">
        <p> {{ $message }} </p>
    </div>
@endif

<table class="table">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Created_at</th>
        <th>Updated_at</th>
        <th>Operation</th>
    </tr>
    @foreach ($categories as $category)

    <tr>
        <td>{{ $category->id }}</td>
        <td>{{ $category->name }}</td>
        <td>{{ $category->created_at->format('Y/m/d') }}</td>
        <td>{{ $category->updated_at->format('Y/m/d') }}</td>
        <td>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Operation
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{{ route('categories.show', $category->id) }}">Show</a></li>
                  <li><a class="dropdown-item" href="{{ route('categories.edit', $category->id) }}">Edit</a></li>
                  <li>
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                  </li>
                </ul>
              </div>
        </td>
    </tr>
        
    @endforeach
</table>

<a href="{{ route('categories.create') }}" class="btn btn-primary">Create Category</a>

@endsection