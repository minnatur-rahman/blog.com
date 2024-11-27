<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        $data['meta_title'] = 'Login';
        return view('auth.login', $data);
    }

    public function register()
    {
        $data['meta_title'] = 'Register';
        return view('auth.register', $data);
    }

    public function forgotPassword()
    {
        $data['meta_title'] = 'Forgot Password';
        return view("auth.forgot", $data);
    }
}
