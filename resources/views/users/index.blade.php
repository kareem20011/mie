@extends('layouts.layout')
@section('contents')


<div class="title-group mb-3">
    <h1 class="h2 mb-0">Users</h1>
</div>



<a href="{{ route( 'users.create' ) }}" class="btn btn-info btn-sm">Create new</a>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">name</th>
            <th scope="col">email</th>
        </tr>
    </thead>
    <tbody>
        @if(count($data) <= 0)
            <tr>
                <td colspan="3">No data !</td>
            </tr>
        @else
        @foreach($data as $index => $val)

        <tr>
            <th scope="row">{{ $index + 1 }}</th>
            <td>{{ $val->name }}</td>
            <td>{{ $val->email }}</td>
            <td class="d-flex">
                <a href="{{ route('users.edit', $val->id) }}" class="btn btn-info btn-sm">Edit</a>
                <form action="{{ route( 'users.destroy', $val->id ) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>


@endsection