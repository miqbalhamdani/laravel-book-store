@extends('layout')

@section('content')

<h3 class="mb-4">Form Author</h3>

<div class="card p-4 w-50">
  @php
    $postUrl = 'author/store';

    // when update data
    $authorId = @$author['id'];
    if ($authorId) $postUrl = 'author/update/'. $authorId;
  @endphp

  <form method="POST" action="{{ url($postUrl) }}">
    {{ csrf_field() }}

    <div class="mb-3">
      <label
        for="input-name"
        class="form-label"
      >
        Name
      </label>

      <input
        type="text"
        name="inputName"
        class="form-control"
        value="{{ @$author['name'] }}"
      >
    </div>

    <div class="mb-3">
      <label
        for="input-address"
        class="form-label"
      >
        Address
      </label>

      <input
        type="text"
        name="inputAddress"
        class="form-control"
        value="{{ @$author['address'] }}"
      >
    </div>

    <button type="submit" class="btn btn-primary">
      Save
    </button>
  </form>
</div>

@endsection
