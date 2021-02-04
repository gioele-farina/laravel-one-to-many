@extends('layouts.mainLayout')

@section('content')
  <h1>Employees list:</h1>
  <ul>

    @foreach ($employees as $employee)
      <li>
        <a href="{{route('employees-show', $employee -> id)}}">
          {{$employee -> name}} {{$employee -> lastname}}
        </a>
      </li>
    @endforeach
  </ul>
@endsection
