<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category()
    {
        $data['getRecord'] = Category::getRecord();
        $data['meta_title'] = 'Login';
        return view('backend.category.list',$data);
    }
}
