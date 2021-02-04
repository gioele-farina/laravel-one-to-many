@extends('layouts.mainLayout')

@section('content')

  <a href="{{route('employees-index')}}">BACK TO EMPLOYEES LIST</a>

  <ul>
    <li>Name: {{$employee -> name}}</li>
    <li>Lastname: {{$employee -> lastname}}</li>
    <li>Date of birth: {{$employee -> dateOfBirth}}</li>
    <li>List of tasks:
        <ul>
          @if (count($employee -> tasks) === 0)
            <li>None</li>
          @else
            @foreach ($employee -> tasks as $task)
              <li>

                <div>
                  <strong>{{$task -> title}}</strong>
                  <br>
                  Priority {{$task -> priority}}
                </div>

                <div>
                  {{$task -> description}}
                </div>

              </li>
            @endforeach
          @endif
        </ul>
    </li>
  </ul>
@endsection
