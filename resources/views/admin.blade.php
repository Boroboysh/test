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

                    <input id="login" name="login" placeholder="login"  class="@error('login_valid') is-invalid @enderror" />
                    <input name="password" type="password" placeholder="password" class="@error('pass_valid') is-invalid @enderror" />
                    @error('login_valid')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    @error('pass_valid')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <input type="submit" value="Войти">
                </form>
        @endguest
    </div>
@endsection
