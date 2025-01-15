<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category()
    {
        $data['getRecord'] = User::getRecordUser();
        $data['meta_title'] = 'Login';
        return view('backend.category.list',$data);
    }
}
