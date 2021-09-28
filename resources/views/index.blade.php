@extends('layout')

@section('content')

<h1>Lesson</h1>

<ul class="list-group">
  @foreach ($lessons as $key => $lesson)
    <a href="{{ ($lesson->slug) }}" class="text-decoration-none" style="cursor: pointer;">
      <li class="list-group-item">
        {{ $key+1 }}.
        {{ $lesson->name }}
      </li>
    </a>
  @endforeach
</ul>


@endsection
