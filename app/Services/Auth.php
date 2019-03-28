<?php

namespace App\Services;

use Config;

class Auth
{
    public static function login(string $password): bool
    {
        if ($password !== Config::get('auth.login_password')) {
            return false;
        }
        session()->regenerate();
        session(['login_password' => $password]);
        return true;
    }

    public static function logout(): void
    {
        session()->forget('login_password');
    }

    public static function checkLogin(): bool
    {
        return session('login_password') === Config::get('auth.login_password');
    }
}
