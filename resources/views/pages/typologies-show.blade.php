@extends('layouts.mainLayout')

@section('content')
  <a href="{{route('typologies-index')}}">BACK TO TYPOLOGY LIST</a>
  <h3>Typology details:</h3>
  <p>Name: {{$typology -> name}}</p>
  <h4>Description:</h4>
  <p>{{$typology -> description}}</p>
@endsection
