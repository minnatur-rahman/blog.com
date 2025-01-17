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
        $data['meta_title'] = 'Categories';
        return view('backend.category.list',$data);
    }

    public function add()
    {
        $data['meta_title'] = 'Add Category';
        return view('backend.category.add',$data);
    }
}
