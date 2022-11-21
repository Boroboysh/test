@extends('home')

@section('title')
    Пользователи
@endsection

@section('content')
    <h2>Вход</h2>
    <div>
        <form action="/signin" method="post">
            @csrf
            <input name="login" placeholder="login">
            <input name="password" type="password" placeholder="password">
            <input type="submit" value="Зарегистрироваться">
        </form>
    </div>
@endsection
