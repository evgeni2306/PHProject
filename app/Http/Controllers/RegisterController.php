<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*    Запускаем проверку введенных данных пользователем (поля непустые)
    Встроенный метод validate() от Laravel */
    public function save(Request $request)
    {
        if (Auth::check())
            return redirect(route('user.private'));

        $validateFields = $request->validate([
            'name'=>'required',
            'surname' =>'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $validateFields['city'] = 'Не указан';
        $validateFields['photo']='/images/avatar.jpg';

        if (User::where('email', $validateFields['email'])->exists()) {
            return redirect(route('user.registration'))->withErrors([
                'email' => 'Такой пользователь уже зарегистрирован'
            ]);
        }
        $user = User::create($validateFields);
        if ($user) {
            Auth::login($user);
            return redirect(route('user.login'))->withErrors([
                'email' => 'Произошла ошибка при сохранении пользоватея'
            ]);
        }
    }
}
