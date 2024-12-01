<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Mail\RegisterMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Str;
use Illuminate\Support\Facades\Mail;


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

    public function auth_login(Request $request)
    {
        // dd($request->all());
        $remember = !empty($request->remember) ? true : false;

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember))
        {

        }
        else
        {
            return redirect()->back()->with('error', 'Please enter correct email and password');
        }
    }

    public function register_user(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
                  
        ]);

        if ($validator->fails()) {
            // dd($validator->errors()->all());
            return back()->withErrors($validator)->withInput();
        }
       
            $save = new User;
            $save->name = $request->name;
            $save->email = $request->email;
            $save->password = Hash::make($request->password); 
            $save-> remember_token = Str::random(40);        
            $save->save();

            Mail::to($save->email)->send(new RegisterMail($save));
    
            return redirect()->route('login')->with('success', 'Your Account Register Successfully and verify your email address.');     
    }

    public function verify($token)
    {
        $user = User::where('remember_token', '=', $token)->first();
        if(!empty($user))
        {
            $user->email_verified_at = date('Y-m-d H:i:s');
            $user-> remember_token = Str::random(40);
            $user->save();

            return redirect()->route('login')->with('success', 'Your Account Register Successfully verified.');  
        }
        else
        {
            abort(404);
        }
    }

}
