<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user()
    {
        $data['meta_title'] = 'Uaer List';
        return view('backend.user.list',$data);
    }
}
