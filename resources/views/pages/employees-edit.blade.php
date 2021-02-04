@extends('layouts.mainLayout')

@section('content')

  <h3>Edit employee</h3>

  <form action="{{route('employees-update', $employee -> id)}}" method="post">
    @csrf
    @method("post")

    <div>
      <label for="name">Name:</label>
      <input name="name" type="text" value="{{ $employee -> name}}">
    </div>

    <div>
      <label for="lastname">Lastname:</label>
      <input name="lastname" type="text" value="{{ $employee -> lastname}}">
    </div>

    <div>
      <label for="dateOfBirth">Date of birth:</label>
      <input name="dateOfBirth" type="date" value="{{ $employee -> dateOfBirth}}">
    </div>

    <input type="submit" value="Edit">
  </form>
@endsection
