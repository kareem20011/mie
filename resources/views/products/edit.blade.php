@extends('layouts.layout')
@section('contents')

<div class="title-group mb-3">
    <h1 class="h2 mb-0">edit product</h1>
</div>


<form action="{{ route( 'products.update', $data->id ) }}" method="post">
    @csrf
    @method('put')
    <!-- Title -->
    <div class="mb-3">
        <label for="title" class="form-label">Enter title</label>
        <input name="title" type="text" class="form-control" id="title" value="{{ $data->title }}">
        @error('title')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <!-- desc -->
    <div class="mb-3">
        <label for="desc" class="form-label">Enter description</label>
        <input name="desc" type="text" class="form-control" id="desc" value="{{ $data->desc }}">
        @error('desc')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <!-- price -->
    <div class="mb-3">
        <label for="price" class="form-label">Enter Price</label>
        <input name="price" type="number" step="0.1" class="form-control" id="price" value="{{ $data->price }}">
        @error('price')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <!-- categoies -->
    <label for="cat_id" class="form-lable">Select category</label>
    <select name="cat_id" id="cat_id" class="form-control mb-5">
        <option>Select option</option>
        @foreach($cats as $row)
        @if($row->id == $data->cat_id)
        <option value="{{ $row->id }}" selected>{{ $row->name }}</option>
        @else
        <option value="{{ $row->id }}">{{ $row->name }}</option>
        @endif
        @endforeach
    </select>


    <!-- colors -->
    <label for="color_id" class="form-lable">Select colos</label>
    <select name="color_id[]" id="color_id" class="form-control mb-5" multiple>
        <option disabled>Select option</option>
        @foreach($colors as $row)

        @if( collect($data->colors)->pluck('id')->contains($row->id) )
        <option value="{{ $row->id }}" selected>{{ $row->name }}</option>
        @else
        <option value="{{ $row->id }}">{{ $row->name }}</option>
        @endif

        @endforeach
    </select>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>



@endsection