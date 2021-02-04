<header>
  <h3>HEADER</h3>

  @if ( !(strpos(Request::url(), 'employee') !== false) )

    <a href="{{route('employees-index')}}">Go to employees list</a>
  @endif

  @if ( !(strpos(Request::url(), 'task') !== false) )

    <a href="{{route('tasks-index')}}">Go to tasks list</a>
  @endif

</header>
