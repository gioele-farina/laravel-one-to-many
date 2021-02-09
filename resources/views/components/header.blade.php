<header>
  <h3>HEADER</h3>

  @if ( !(strpos(Request::url(), 'employee') !== false) )

    <a href="{{route('employees-index')}}">Go to employees list</a>
  @endif

  @if ( !(strpos(Request::url(), 'task') !== false) )

    <a href="{{route('tasks-index')}}">Go to tasks list</a>
  @endif

  @if ( !(strpos(Request::url(), 'typologies') !== false) )

    <a href="{{route('typologies-index')}}">Go to typologies list</a>
  @endif

  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif

</header>
