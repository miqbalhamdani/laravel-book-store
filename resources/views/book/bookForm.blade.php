@extends('layout')

@section('content')

<h3 class="mb-4">Form Book</h3>

<div class="card p-4 w-50">
  @php
    $postUrl = 'book/store';

    // when update data
    $bookId = @$book['id'];
    if ($bookId) $postUrl = 'book/update/'. $bookId;
  @endphp

  <form method="POST" action="{{ url($postUrl) }}">
    {{ csrf_field() }}

    <div class="mb-3">
      <label
        for="input-title"
        class="form-label"
      >
        Title
      </label>

      <input
        type="text"
        name="inputTitle"
        class="form-control"
        value="{{ @$book['title'] }}"
      >
    </div>

    <div class="mb-3">
      <label
        for="input-author"
        class="form-label"
      >
        Author
      </label>

      <select class="form-select" name="inputAuthorId">
        @foreach ($authors as $author)
          <option
            value="{{ $author->id }}"
            @if(@$book['author_id'] == $author->id)
              selected
            @endif
          >
            {{ $author->name }}
          </option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label
        for="input-status"
        class="form-label"
      >
        Status
      </label>

      <select class="form-select" name="inputStatus">
        <option value="available" @if(@$book['status'] == 'available') selected @endif>available</option>
        <option value="preorder" @if(@$book['status'] == 'preorder') selected @endif>preorder</option>
      </select>
    </div>

    <div class="mb-3">
      <label
        for="input-price"
        class="form-label"
      >
        Price
      </label>

      <input
        type="number"
        min="0"
        step="100"
        name="inputPrice"
        class="form-control"
        value="{{ @$book['price'] }}"
      >
    </div>

    <button type="submit" class="btn btn-primary">
      Save
    </button>
  </form>
</div>

@endsection
