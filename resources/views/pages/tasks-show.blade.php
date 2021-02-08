@extends('layouts.mainLayout')

@section('content')

  <a href="{{route('tasks-index')}}">BACK TO TASKS LIST</a>

  <h2>{{$task -> title}}</h2>
  <p>Priority: {{$task -> priority}}<p>
  <p>{{$task -> description}}</p>

  <h3>Typologies of task:</h3>
  @if (count($task -> typologies) !== 0)
    <ul>
      @foreach ($task -> typologies as $type)
        <a href="{{route('typologies-show', $type -> id)}}">
          <li>{{$type -> name}}</li>
        </a>
      @endforeach
    </ul>
  @else
    <ul>
      <li>No typologies assigned</li>
    </ul>
  @endif

  @if ($task -> employee_id === NULL)
    <h5>Not assigned yet.</h5>
  @else
    <h5>Assigned to: {{$task -> employee -> name}} {{$task -> employee -> lastname}}</h5>
  @endif
@endsection
