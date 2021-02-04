@extends('layouts.mainLayout')

@section('content')
  <h1>Tasks list:</h1>
  <ul>

    @foreach ($tasks as $task)
      <li>
        <a href="{{route('tasks-show', $task -> id)}}">
          {{$task -> title}}
        </a>
      </li>
    @endforeach
  </ul>
@endsection
