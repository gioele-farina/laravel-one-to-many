@extends('layouts.mainLayout')

@section('content')
  <h3>Create a new typology</h3>

  <form action="{{route('typologies-store')}}" method="post">
    @csrf
    @method('post')

    <div>
      <label for="name">Name:</label>
      <input name="name" type="text">
    </div>

    <div>
      <label for="description">Description:</label>
      <textarea name="description" rows="5" cols="50" class="typology-description"></textarea>
    </div>

    <input type="submit" value="Create">
  </form>
@endsection
