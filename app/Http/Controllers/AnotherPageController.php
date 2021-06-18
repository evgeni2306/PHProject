<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AnotherPageController extends Controller
{
    public function getAnotherPage($id)
    {

        if (is_numeric($id)) {
        } else {
            if (!Auth::check())
                return redirect(route('user.pageEditor'));
            else {
                return redirect(route('user.login'));
            }
        }
        $request = DB::table('users')->select('name','surname','city','birthday','photo')->where('id',$id)->first();
        $_SESSION['anotherName'] = $request->name;
        $_SESSION['anotherSurname'] = $request->surname;
        $_SESSION['anotherCity'] = $request->city;
        $_SESSION['anotherBirthday'] = $request->birthday;
//        $_SESSION['anotherId'] = $request->id;
        $_SESSION['anotherAvatar'] = $request->photo;
        $_SESSION['anotherId'] = $id;
        return view('anotherPage');


    }
}
