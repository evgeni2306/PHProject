<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

session_start();
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
Route::view('/', 'auth.login')->name('home');

Route::get('/id={id}', [\App\Http\Controllers\AnotherPageController::class, 'getAnotherPage']);
Route::get('/search-page', 'App\Http\Controllers\SearchController@showPage')->name('search-page');
Route::get('/search', 'App\Http\Controllers\SearchController@search')->name('search');


//Route::get('/{aleas}', function () {
//    if (Auth::check()) {
//        return redirect(\route('user.private'));
//    }
//    return view('login');
//    //Этот роут будет кидать на страницу логина любые роуты, которых нету// недоделан
//});

// Routes для регистрации - авторизации
Route::name('user.')->group(function () {
    Route::view('/private', 'private.user')->middleware('auth')->name("private");

    Route::get('/login', function () {
        if (Auth::check())
        {
            return redirect(\route('user.private'));
        }
        return view('auth.login');
    })->name('login');

    Route::post('/login', [LoginController::class, 'login']);

    Route::get('/logout', function () {
        session_destroy();
        Auth::logout();
        return redirect('/');
    })->name('logout');

    Route::get('/registration', function () {
        if (Auth::check())
        {
            return redirect(\route('user.private'));
        }
        return view('auth.registration');
    })->name('registration');

    Route::get('/pageEditor', function () {
        if (!Auth::check())
        {
            return redirect(\route('user.login'));
        }
        return view('PageEditor');
    })->name('pageEditor');
    Route::post('/registration', [RegisterController::class, 'save']);
    Route::post('/pageEditor', [\App\Http\Controllers\EditorController::class, 'update']);
});


