@extends('layouts.mainLayout')

@section('content')
  <h3>Create a new typology</h3>
  <a href="{{route('typologies-index')}}">BACK TO TYPOLOGIES LIST</a>

  <form action="{{route('typologies-update', $typology -> id)}}" method="post">
    @csrf
    @method('post')

    <div>
      <label for="name">Name:</label>
      <input name="name" type="text" value="{{$typology -> name}}">
    </div>

    <div>
      <label for="description">Description:</label>
      <textarea name="description" rows="5" cols="50" class="typology-description">
        {{$typology -> description}}
      </textarea>
    </div>

    <div>
      @php
      $listOfTasks = [];
      foreach ($typology -> tasks as $task) {
        $listOfTasks[] = $task -> id;
      }
      @endphp

      <label for="associated_tasks">Associate tasks (multiple selection allowed):</label>
      <br>
      <select class="multiple-select" name="associated_tasks" multiple>
        @foreach ($tasks as $task)
          <option value="{{$task -> id}}"

            @if (in_array($task -> id ,$listOfTasks))
              selected
            @endif

          >{{$task -> title}}</option>
        @endforeach
      </select>
    </div>

    <input type="submit" value="Edit">
  </form>
@endsection
