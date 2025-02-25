@extends('layouts.layout')
@section('contents')

<!-- php artisan make:request StoreProductRequest -->


<div class="title-group mb-3">
    <h1 class="h2 mb-0">create User</h1>
</div>


<form action="{{ route( 'users.store' ) }}" method="post">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Enter name</label>
        <input name="name" type="text" class="form-control" id="name">
        @error('name')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Enter email</label>
        <input name="email" type="email" class="form-control" id="email">
        @error('email')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Enter password</label>
        <input name="password" type="password" step="0.1" class="form-control" id="password">
        @error('password')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>



@endsection