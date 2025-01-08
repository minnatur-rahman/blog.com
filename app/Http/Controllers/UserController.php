<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user()
    {
        $data['getRecord'] = User::getRecordUser();
        $data['meta_title'] = 'Uaer List';
        return view('backend.user.list',$data);
    }

    public function add()
    {
        $data['meta_title'] = 'Add User';
        return view('backend.user.add',$data);
    }

    public function store(Request $request)
    {
        dd('ok');
    }
}
