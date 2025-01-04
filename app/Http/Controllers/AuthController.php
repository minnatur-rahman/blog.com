<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPasswordMail;
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

    public function forgot()
    {
        $data['meta_title'] = 'Forgot Password';
        return view("auth.forgot", $data);
    }

    public function reset($token)
    {
       $user = User::where('remember_token', '=', $token)->first();
       if(!empty($user))
       {
        
            $data['meta_title'] = 'Reset Password';
            return view('auth.reset',$data);
       }
       else
       {
         abort(404);
       }
    }

    public function post_reset($token,Request $request)
    {
        $user = User::where('remember_token', '=', $token)->first();
        if(!empty($user))
        {      
            if($request->password == $request->cpassword)
            {
                $user->password = Hash::make($request->password);
                $user->email_verified_at =date('Y-m-d H:i:s');
                $user-> remember_token = Str::random(40);        
                $user->save();
            }
            else
            {
                return redirect()->back()->with('success', 'Password and Confirm Password does not match');
            }
        }
        else
        {
          abort(404);
        }
    }

    public function forgotPassword(Request $request)
    {
       $user = User::where('email', '=', $request->email)->first();
       if(!empty($user))
       {
            $user-> remember_token = Str::random(40);        
            $user->save();

            Mail::to($user->email)->send(new ForgotPasswordMail($user));

            return redirect()->back()->with('success', 'please check your email and resset your password.');
       }
       else
       {
            return redirect()->back()->with('errors', 'Email not found in the system');
       }
    }

    public function auth_login(Request $request)
    {
        $remember = !empty($request->remember) ? true : false;

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember))
        {
          if(!empty(Auth::user()->email_verified_at))
          {
            echo "successfully";
            die;
          }
          else 
          {
            $user_id = Auth::user()->id;
            Auth::logout();

            $save = User::getSingle($user_id);
            $save-> remember_token = Str::random(40);        
            $save->save();

            Mail::to($save->email)->send(new RegisterMail($save));
    
            return redirect()->back()->with('success', 'please first you can verify your email address.');    
          }
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
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
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

            return redirect('login')->with('success', 'Your Account Register Successfully verified.');  
        }
        else
        {
            abort(404);
        }
    }

}
