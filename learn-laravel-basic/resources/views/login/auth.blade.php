@extends('login.master')

@section('context')

    <form action="{{ route('login.success') }}" method="POST" class="mt-5">
        @csrf
        <div class="">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" class="form-control">
            @error('email')
                <div class="alert alert-danger form-control">{{ $message }}</div>
            @enderror
        </div>
        <div class="">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control">
            @error('password')
                <div class="alert alert-danger form-control">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary my-3">Login</button>
    </form>
    <a href="{{ route('login.register') }}" class="btn btn-secondary">Register</a>

@endsection