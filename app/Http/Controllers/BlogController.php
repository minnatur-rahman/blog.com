<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blog()
    {
        // $data['getRecord'] = Category::getRecord();
        $data['meta_title'] = 'Blogs';
        return view('backend.blog.list',$data);
    }

    public function add()
    {
        $data['meta_title'] = 'Add Blog';
        return view('backend.blog.add',$data);
    }
}
