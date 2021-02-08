@extends('layouts.mainLayout')

@section('content')
  <h3>Create a new task</h3>

  <form action="{{route('tasks-store')}}" method="post">
    @csrf
    @method('post')

    <div>
      <label for="title">Title:</label>
      <input name="title" type="text">
    </div>

    <div>
      <label for="description">Description:</label>
      <textarea name="description" rows="5" cols="50" class="task-description"></textarea>
    </div>

    <div>
      <label for="priority">Priority:</label>
      <select name="priority">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
      </select>
    </div>

    <div>
      <label for="employee_id">Assign to:</label>
      <select name="employee_id">
          <option value="">-</option>
        @foreach ($employees as $employee)
          <option value="{{$employee -> id}}">{{$employee -> name}} {{$employee -> lastname}}</option>
        @endforeach
      </select>
    </div>

    <div>
      <label for="assignToTyp[]">Assign to typologies:</label><br>
      <select name="assignToTyp[]" multiple="multiple">
        @foreach ($typologies as $typology)
          <option value="{{$typology -> id}}">{{$typology -> name}}</option>
        @endforeach
      </select>
    </div>

    <input type="submit" value="Save">
  </form>
@endsection
