@extends('layouts.mainLayout')

@section('content')

  <a href="{{route('tasks-index')}}">BACK TO TASKS LIST</a>

  <h2>{{$task -> title}}</h2>
  <p>Priority: {{$task -> priority}}<p>
  <p>{{$task -> description}}</p>
  @if ($task -> employee_id === NULL)
    <h5>Not assigned yet.</h5>
  @else
    <h5>Assigned to: {{$task -> employee -> name}} {{$task -> employee -> lastname}}</h5>
  @endif
@endsection
