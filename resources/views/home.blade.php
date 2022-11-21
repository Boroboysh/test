<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>
    @yield('styles')
</head>
<body class="antialiased">
<header>
    <h3>Header</h3>
    <div>
        <a href="/users">Users</a>
        <a href="/home">Главная</a>
        <a href="/aboutUs">О нас</a>
        <a href="/poster">Афиша</a>
        <a href="/contacts">Где нас найти</a>

        @auth
            <div>Вы в системе</div>
            <div>
                <button>
                    <a href="/logout">Выйти</a>
                </button>
            </div>
        @endauth

        @guest
            <div>
                <a href="/login"> Войти </a>
                /
                <a href="/register"> Зарегистрироваться </a>
            </div>
        @endguest

        {{-- @if(session()->has('userAuth'))
             <div>Вы в системе</div>
             <div>
                 <button>
                     <a href="/logout">Выйти</a>
                 </button>
             </div>
         @else
             <div>
                 <a href="/login"> Войти </a>
                 /
                 <a href="/register"> Зарегистрироваться </a>
             </div>
         @endif--}}
    </div>
</header>
@yield('content')
</body>
</html>
