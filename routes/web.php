<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Console\Output\ConsoleOutput;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/aboutUs', function () {
    return view('aboutUs');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/poster', function () {
    return view('poster');
});

Route::get('/admin', function () {
    return view('admin');
});

Route::post('/admin_signin', function (\Illuminate\Http\Request $req){
    $user = \App\Models\User::where('login', $req->input('login'))->where('password', $req->input('password'))->first();

    if ($user) {
        Auth::login($user);
        return redirect('/admin');
    } else {
        return redirect('/home');
    }
});

Route::get('/auth_user', function (){
    return response('Поздравляю, вы в системе!');
})->middleware('auth');


Route::post('/signin', function (\Illuminate\Http\Request $req) {
    $checkUser = \App\Models\User::where('login', $req->input('login'))->where('password', $req->input('password'))->first();

    if ($checkUser) {
        Auth::login($checkUser);
        return redirect('/home');
    } else {
        return response('Вы не вошли');
    }

});

Route::post('/new_user', function (\Illuminate\Http\Request $req) {
    \App\Models\User::firstOrCreate([
        "login" => $req->input('login'),
        "password" => $req->input('password'),
        "email" => $req->input('email'),
        "name" => $req->input('name'),
        "surname" => $req->input('surname'),
    ]);

    $user = \App\Models\User::where('login', $req->input('login'))->where('password', $req->input('password'))->first();
    Auth::login($user);
    return redirect('/home');

});

Route::get('/logout', function () {
    Auth::logout();

    return redirect('/home');
});

Route::get('/users', function () {
    $usersArray = DB::table('users')->get();


    /*    $output = new ConsoleOutput();
        $output->writeln();*/

    return view('users', ['usersArray' => $usersArray]);
});
