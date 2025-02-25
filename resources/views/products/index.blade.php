@extends('layouts.app')
@section('contents')


<div class="title-group mb-3">
  <h1 class="h2 mb-0">Products</h1>
</div>



<a href="{{ route( 'products.create' ) }}" class="btn btn-info btn-sm">Create new</a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">title</th>
      <th scope="col">description</th>
      <th scope="col">price</th>
      <th scope="col">actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($data as $index => $val)
    <tr>
      <th scope="row">{{ $index + 1 }}</th>
      <td>{{ $val->title }}</td>
      <td>{{ $val->desc }}</td>
      <td>{{ $val->price }}</td>
      <td class="d-flex">
        <a href="{{ route('products.edit', $val->id) }}" class="btn btn-info btn-sm">Edit</a>
        <form action="{{ route( 'products.destroy', $val->id ) }}" method="post">
          @csrf
          @method('delete')
          <button type="submit" class="btn btn-danger btn-sm">Delete</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>


@endsection