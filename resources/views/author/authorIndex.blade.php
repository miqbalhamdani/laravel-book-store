@extends('layout')

@section('content')

<div class="d-flex justify-content-between my-3">
  <h3>Author Data</h3>

  <a href="{{ URL('/author/create') }}">
    <button type="button" class="btn btn-outline-primary">
      Add Author
    </button>
  </a>
</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Address</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($authors as $author)
      <tr>
        <td class="align-middle">{{ $author->name }}</td>
        <td class="align-middle">{{ $author->address }}</td>
        <td class="align-middle text-center">
          <a href="{{ URL('/author/edit/'. $author->id) }}">
            <button
              style="width: 80px"
              type="button"
              class="btn btn-outline-warning"
            >
              Edit
            </button>
          </a>

          <a href="{{ URL('/author/delete/'. $author->id) }}">
            <button
              style="width: 80px"
              type="button"
              class="btn btn-outline-danger"
            >
            Delete
            </button>
          </a>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>

@endsection
