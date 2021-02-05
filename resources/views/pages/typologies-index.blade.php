@extends('layouts.mainLayout')

@section('content')
  <h2>Tasks' typologies</h2>
  <a href="{{route('typologies-create')}}">Create a new one</a>
  <ul>
    @foreach ($typologies as $typology)
      <li>
        <a href="{{route('typologies-show', $typology -> id)}}">{{$typology -> name}}</a>
        -
        <a href="{{route('typologies-edit', $typology -> id)}}">EDIT</a>
      </li>
    @endforeach
  </ul>
@endsection
