@extends('layouts.mainLayout')

@section('content')

  <h3>Create a new employee</h3>

  <form action="{{route('employees-store')}}" method="post">
    @csrf
    @method("post")

    <div>
      <label for="name">Name:</label>
      <input name="name" type="text">
    </div>

    <div>
      <label for="lastname">Lastname:</label>
      <input name="lastname" type="text">
    </div>

    <div>
      <label for="dateOfBirth">Date of birth:</label>
      <input name="dateOfBirth" type="date">
    </div>

    <input type="submit" value="Save">
  </form>
@endsection
