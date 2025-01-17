<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blog()
    {
        $data['getRecord'] = Category::getRecord();
        $data['meta_title'] = 'Blogs';
        return view('backend.blog.list',$data);
    }
}
