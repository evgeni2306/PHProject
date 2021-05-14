<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class EditorController extends Controller
{
    public function update(Request $request)
    {
        if (!Auth::check())
            return redirect(route('user.pageEditor'));

        $validateFields = $request->validate([
            'name' =>'required',
            'surname'=>'required',
            'city' =>'required',
            'birthday'=>'required',
//            'photo'=>'required',
//            'email' => 'required|email',
        ]);
        $user = User::where('id',3)->update($request->all());
        return redirect(route('user.private'));
    }
}
