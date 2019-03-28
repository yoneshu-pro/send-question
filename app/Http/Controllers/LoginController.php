<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Services\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::checkLogin() === true) {
            return redirect('/presents');
        }
        return view('login');
    }

    public function login(LoginRequest $request)
    {
        if (Auth::login($request->password) === false) {
            return back()->withErrors(['errorMessage' => 'パスワードが違います。']);
        }

        return redirect('/presents');
    }
}
