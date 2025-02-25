@extends('layouts.layout')
@section('contents')

<div class="title-group mb-3">
    <h1 class="h2 mb-0">edit product</h1>
</div>


<form action="{{ route( 'products.update', $data->id ) }}" method="post">
    @csrf
    @method('put')
    <div class="mb-3">
        <label for="title" class="form-label">Enter title</label>
        <input name="title" type="text" class="form-control" id="title" value="{{ $data->title }}">
        @error('title')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="desc" class="form-label">Enter description</label>
        <input name="desc" type="text" class="form-control" id="desc" value="{{ $data->desc }}">
        @error('desc')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">Enter Price</label>
        <input name="price" type="number" step="0.1" class="form-control" id="price" value="{{ $data->price }}">
        @error('price')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>



@endsection