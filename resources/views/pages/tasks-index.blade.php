@extends('layouts.mainLayout')

@section('content')
  <h1>Tasks list:</h1>
  <ul>

    @foreach ($tasks as $task)
      <li>{{$task -> title}}</li>
    @endforeach
  </ul>
@endsection
