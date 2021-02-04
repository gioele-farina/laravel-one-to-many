@extends('layouts.mainLayout')

@section('content')
  <h1>Tasks list:</h1>
  <a href="{{route('tasks-create')}}">Create a new task</a>
  <ul>

    @foreach ($tasks as $task)
      <li>
        <a href="{{route('tasks-show', $task -> id)}}">
          {{$task -> title}}
        </a>
        -
        <a href="{{route('tasks-edit', $task -> id)}}">EDIT</a>
      </li>
    @endforeach
  </ul>
@endsection
