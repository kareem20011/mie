@extends('layouts.layout')
@section('contents')

<div class="title-group mb-3">
    <h1 class="h2 mb-0">edit colors</h1>
</div>


<form action="{{ route( 'colors.update', $data->id ) }}" method="post">
    @csrf
    @method('put')
    <div class="mb-3">
        <label for="name" class="form-label">Enter name</label>
        <input name="name" type="text" class="form-control" id="name" value="{{ $data->name }}">
        @error('name')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>



@endsection