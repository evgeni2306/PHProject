<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{

    public function login(Request $request)
    {
        if (Auth::check())
            return redirect()->intended(route('user.private'));

        $formFields = $request->only(['email', 'password']);

        if (Auth::attempt($formFields)) {
            $user = DB::table('users')->where('email', $formFields['email'])->first();
            $_SESSION['name'] = $user->name;
            $_SESSION['surname'] = $user->surname;
            $_SESSION['city'] = $user->city;
            $_SESSION['birthday'] = $user->birthday;
            $_SESSION['id'] = $user->id;
            $_SESSION['avatar'] = $user->photo;
            return redirect()->intended(route('user.private'))->with('success', 'Вы успешно вошли в систему!');
        }
        return redirect(route('user.login'))->withErrors([
            'email' => 'Неверное имя пользователя или пароль'
        ]);
    }
}
