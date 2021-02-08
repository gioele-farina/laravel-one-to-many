@extends('layouts.mainLayout')

@section('content')
  <a href="{{route('typologies-index')}}">BACK TO TYPOLOGY LIST</a>
  <h3>Typology details:</h3>
  <p>Name: {{$typology -> name}}</p>
  <h4>Description:</h4>
  <p>{{$typology -> description}}</p>
  <h4>Associated to tasks:</h4>

  @if (count($typology -> tasks) !== 0)
    <ul>
      @foreach ($typology -> tasks as $task)
        <li>{{$task -> title}}</li>
      @endforeach
    </ul>
  @else
    <ul>
      <li>No tasks assigned.</li>
    </ul>
  @endif
@endsection
