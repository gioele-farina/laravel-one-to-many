@extends('layouts.mainLayout')

@section('content')
  <h1>Employees list:</h1>
  <a href="{{route('employees-create')}}">Create a new Employee</a>
  <ul>

    @foreach ($employees as $employee)
      <li>
        <a href="{{route('employees-show', $employee -> id)}}">
          {{$employee -> name}} {{$employee -> lastname}}
        </a>
        -
        <a href="{{route('employees-edit', $employee -> id)}}">EDIT</a>
      </li>
    @endforeach
  </ul>
@endsection
