@extends('home')

@section('title')
    Пользователи
@endsection

@section('content')
    <h2>Admin Panel</h2>
    <div>
        @auth
            <h4>Вы в админ панеле</h4>
        @endauth

        @guest
                <form action="/admin_signin" method="post">
                    @csrf
                    <input name="login" placeholder="login">
                    <input name="password" type="password" placeholder="password">
                    <input type="submit" value="Войти">
                </form>
        @endguest

    </div>
@endsection
