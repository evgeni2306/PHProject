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
Route::view('/', 'login');

Route::get('/id={idd}', [\App\Http\Controllers\AnotherPageController::class, 'getAnotherPage']);

//Route::get('/{aleas}', function () {
//    if (Auth::check()) {
//        return redirect(\route('user.private'));
//    }
//    return view('login');
//    //Этот роут будет кидать на страницу логина любые роуты, которых нету// недоделан
//});

// Routes для регистрации - авторизации
Route::name('user.')->group(function () {
    Route::view('/private', 'private')->middleware('auth')->name("private");

    Route::get('/login', function () {
        if (Auth::check()) {
            return redirect(\route('user.private'));
        }
        return view('login');
    })->name('login');

    Route::post('/login', [LoginController::class, 'login']);

    Route::get('/logout', function () {
        session_destroy();
        Auth::logout();
        return redirect('/');
    })->name('logout');

    Route::get('/registration', function () {
        if (Auth::check()) {
            return redirect(\route('user.private'));
        }
        return view('registration');
    })->name('registration');

    Route::get('/pageEditor', function () {
        if (!Auth::check()) {
            return redirect(\route('user.login'));
        }
        return view('PageEditor');
    })->name('pageEditor');

    Route::post('/registration', [RegisterController::class, 'save']);
    Route::post('/pageEditor', [\App\Http\Controllers\EditorController::class, 'update']);
});


