<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category()
    {
        $data['meta_title'] = 'Login';
        return view('backend.category.list',$data);
    }
}
