<?php

use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('pageMain');
});*/

Route::view('/', 'login');

Route::get('/account', function () {
    return view('pageAccount');
});
Route::get('/pageEditor', function () {
    return view('pageEditor');
});
Route::get('/pageMain', function () {
    return view('pageMain');
});

// Routes для регистрации - авторизации

Route::name('user.')->group(function () {
    Route::view('/private', 'private')->middleware('auth')->name("private");

    Route::get('/login', function () {
        if (\Illuminate\Support\Facades\Auth::check()) {
            return redirect(\route('user.private'));
        }
        return view('login');
    })->name('login');

    Route::post('/login', [\App\Http\Controllers\LoginController::class, 'login']);

    Route::get('/logout', function () {
        \Illuminate\Support\Facades\Auth::logout();
        return redirect('/');
    })->name('logout');

    Route::get('/registration', function () {
        if (\Illuminate\Support\Facades\Auth::check()) {
            return redirect(\route('user.private'));
        }
        return view('registration');
    })->name('registration');

    Route::post('/registration', [\App\Http\Controllers\RegisterController::class, 'save']);
});


