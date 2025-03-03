@extends('layouts.layout')
@section('contents')


<div class="title-group mb-3">
  <h1 class="h2 mb-0">Categories</h1>
</div>



<a href="{{ route( 'categories.create' ) }}" class="btn btn-info btn-sm">Create new</a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">name</th>
    </tr>
  </thead>
  <tbody>
    @foreach($data as $index => $val)
    <tr>
      <th scope="row">{{ $index + 1 }}</th>
      <td>{{ $val->name }}</td>
      <td class="d-flex">
        <a href="{{ route('categories.edit', $val->id) }}" class="btn btn-info btn-sm">Edit</a>
        <form action="{{ route( 'categories.destroy', $val->id ) }}" method="post">
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