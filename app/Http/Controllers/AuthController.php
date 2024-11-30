<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Mail\RegisterMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

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

    // public function register_user(Request $request)
    // {
    //     // dd($request->all());
    //     $validator = Validator::make($request->all(), [
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|email|unique:users,email',
    //         'password' => 'required|min:6',
                  
    //     ]);

    //     if ($validator->fails()) {
    //         // dd($validator->errors()->all());
    //         return back()->withErrors($validator)->withInput();
    //     }
       
    //         $save = new User;
    //         $save->name = $request->name;
    //         $save->email = $request->email;
    //         $save->password = Hash::make($request->password);
    //         $save->remember_token = Str::random(40);         
    //         $save->save();

    //         Mail::to($save->mail)->send(new RegisterMail($save));
    
    //         return redirect()->route('login')->with('success', 'Your Account Register Successfully.');     
    // }


    

    public function register_user(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'terms' => 'accepted',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $recipientEmail = $request->email;

        if (!$recipientEmail) {
            throw new \Exception('Recipient email is missing.');
        }

        Mail::to($recipientEmail)->send(new RegisterMail($user));

        return redirect('login')->with('success', 'Your Account Register Successfully and varified your email address.');
    }


    public function forgotPassword()
    {
        $data['meta_title'] = 'Forgot Password';
        return view("auth.forgot", $data);
    }
}
