@extends('layouts.layout')
@section('contents')

<div class="title-group mb-3">
    <h1 class="h2 mb-0">Edit user</h1>
</div>


<form action="{{ route( 'users.update', $data->id ) }}" method="post">
    @csrf
    @method('put')
    <div class="mb-3">
        <label for="name" class="form-label">Enter name</label>
        <input name="name" type="text" class="form-control" id="name" value="{{ $data->name }}">
        @error('name')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Enter email</label>
        <input name="email" type="text" class="form-control" id="email" value="{{ $data->email }}">
        @error('email')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>



@endsection