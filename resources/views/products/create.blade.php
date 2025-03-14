@extends('layouts.layout')
@section('contents')

<!-- php artisan make:request StoreProductRequest -->


<div class="title-group mb-3">
    <h1 class="h2 mb-0">create products</h1>
</div>
<form action="{{ route( 'products.store' ) }}" method="post">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Enter title</label>
        <input name="title" type="text" class="form-control" id="title">
        @error('title')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="desc" class="form-label">Enter description</label>
        <input name="desc" type="text" class="form-control" id="desc">
        @error('desc')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">Enter Price</label>
        <input name="price" type="number" step="0.1" class="form-control" id="price">
        @error('price')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <label for="cat_id" class="form-label">Enter category</label>
    <select name="cat_id" id="cat_id" class="form-control mb-5">
        @foreach($cats as $row)
        <option value="{{ $row->id }}">{{ $row->name }}</option>
        @endforeach
    </select>

    <label for="color_id" class="form-label">Enter color</label>
    <select name="color_id[]" id="color_id" class="form-control mb-5" multiple>
        @foreach($colors as $row)
        <option value="{{ $row->id }}">{{ $row->name }}</option>
        @endforeach
    </select>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>



@endsection