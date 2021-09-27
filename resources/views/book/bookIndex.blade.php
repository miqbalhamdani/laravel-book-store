@extends('layout')

@section('content')

<div class="d-flex justify-content-between my-3">
  <h3>Book Data</h3>

  <a href="{{ URL('/book/create') }}">
    <button type="button" class="btn btn-outline-primary">
      Add Book
    </button>
  </a>
</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Title</th>
      <th scope="col">Author</th>
      <th scope="col">Price</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($books as $book)
      <tr>
        <td class="align-middle">
          {{ $book->title }} <br>
          {!! $book->status_badge !!}
        </td>
        <td class="align-middle">{{ $book->author->name }}</td>
        <td class="align-middle">{{ rupiahFormat($book->price) }}</td>
        <td class="align-middle text-center">
          <a href="{{ URL('/book/edit/'. $book->id) }}">
            <button
              style="width: 80px"
              type="button"
              class="btn btn-outline-warning"
            >
              Edit
            </button>
          </a>

          <a href="{{ URL('/book/delete/'. $book->id) }}">
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
