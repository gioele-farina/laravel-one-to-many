@extends('layouts.mainLayout')

@section('content')
  <a href="{{route('tasks-index')}}">BACK TO TASK LIST</a>

  <h3>Edit a task</h3>
  <form action="{{route('tasks-update', $task -> id)}}" method="post">
    @csrf
    @method('post')

    <div>
      <label for="title">Title:</label>
      <input name="title" type="text" value="{{$task -> title}}">
    </div>

    <div>
      <label for="description">Description:</label>
      <textarea name="description" rows="5" cols="50" class="task-description">{{$task -> description}}</textarea>
    </div>

    <div>
      <label for="priority">Priority:</label>
      <select name="priority">
        @for ($i = 1; $i <= 5; $i++)
            <option value="{{$i}}"
              @if ($i === $task -> priority)
                selected
              @endif
            >{{$i}}</option>
        @endfor
      </select>
    </div>

    <div>
      <label for="employee_id">Assign to:</label>
      <select name="employee_id">
          <option value=""
            @if ($task -> employee_id === NULL)
              selected
            @endif
          >-</option>

        @foreach ($employees as $employee)
          <option value="{{$employee -> id}}"
            @if ($task -> employee_id === $employee -> id)
              selected
            @endif
          >{{$employee -> name}} {{$employee -> lastname}}</option>
        @endforeach
      </select>

      <div>
        @php
          $listOfTypologies = [];
          foreach ($task -> typologies as $typology) {
            $listOfTypologies[] = $typology -> id;
          }
        @endphp
        <label for="">Typologies of task (multiple select allowed):</label>
        <br>
        <select class="multiple-select" name="associated_typologies[]" multiple="multiple">
          @foreach ($typologies as $typology)
            <option value="{{$typology -> id}}"

              @if (in_array($typology -> id , $listOfTypologies))
                selected
              @endif

            >{{$typology -> name}}</option>
          @endforeach
        </select>

      </div>
    </div>

    <input type="submit" value="Edit">
  </form>
@endsection
