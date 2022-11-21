@extends('home')

@section('title')
    Пользователи
@endsection

@section('content')
    <h2>Регистрация </h2>
    <div>
        <form action="/new_user" method="post">
            @csrf
            <input name="name" placeholder="name">
            <input name="surname" placeholder="surname">
            <input name="email" placeholder="email">
            <input name="login" placeholder="login">
            <input name="password" type="password" placeholder="password">
            <input type="submit" value="Зарегистрироваться">
        </form>
    </div>
@endsection
