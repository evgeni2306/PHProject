<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function showPage()
    {
        $users = User::all();
        return view('private.search.search-page', ['users' => $users]);
    }

    public function search(Request $request)
    {
        $info = $request->name;
        $users = User::where('name', 'LIKE', "%{$info}%")->
        orWhere('surname', 'LIKE', "%{$info}%")->
        orderBy('id')->
        get();
        if (count($users) != 0)
        {
            return view('private.search.search-result', ['users' => $users])->with('succes', 'Были найдены следующие пользователи');
        }
        return redirect()->route('search-page')->withErrors('Пользователь не найден!');
//        dd(count($users);
    }
}
