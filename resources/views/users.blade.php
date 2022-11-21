@extends('home')

@section('title')
    Пользователи
@endsection

@section('content')
    <div>Пользователи: </div>
    <div>
        <div>{!! $usersArray !!}</div>
      {{--  @foreach($usersArray as $user)
            <div>{{$user}}</div>
        @endforeach--}}
    </div>
@endsection
