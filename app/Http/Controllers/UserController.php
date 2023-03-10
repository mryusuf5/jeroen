<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('name', '=', $request->username)->first();

        if($user)
        {
            if($request->password == $user->password)
            {
                $request->session()->put('admin', $user);
                return redirect()->route('admin.dashboard');
            }
            return redirect()->route('login');
        }
        return redirect()->route('login');
    }

    public function logout()
    {
        Session::pull('admin');
        return redirect()->route('home');
    }
}
