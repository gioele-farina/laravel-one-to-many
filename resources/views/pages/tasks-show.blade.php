@extends('layouts.mainLayout')

@section('content')

  <a href="{{route('tasks-index')}}">BACK TO TASKS LIST</a>

  <h2>{{$task -> title}}</h2>
  <p>Priority: {{$task -> priority}}<p>
  <p>{{$task -> description}}</p>
  <h5>Assigned to: {{$task -> employee -> name}} {{$task -> employee -> lastname}}</h5>
@endsection
