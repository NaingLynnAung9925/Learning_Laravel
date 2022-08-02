@extends('login.master')

@section('context')

    <form action="{{ route('login.store') }}" method="POST" class="mt-5">
        @csrf
        <div class="">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control">
            @error('name')
                <div class="alert alert-danger form-control">{{ $message }}</div>
            @enderror
        </div>
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
        <div class="">
            <label for="confirm_password">Confirm Password</label>
            <input type="password" name="confirm_password" id="confirm_password" class="form-control">
            @error('confirm_password')
                <div class="alert alert-danger form-control">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary mt-3">Register</button>
    </form>

@endsection
