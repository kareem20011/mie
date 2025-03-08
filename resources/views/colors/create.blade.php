@extends('layouts.layout')
@section('contents')


<div class="title-group mb-3">
    <h1 class="h2 mb-0">create colors</h1>
</div>


<form action="{{ route( 'colors.store' ) }}" method="post">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Enter name</label>
        <input name="name" type="text" class="form-control" id="name">
        @error('name')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>



@endsection