<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
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
        $data['getCategory'] = Category::getCategory();
        $data['meta_title'] = 'Add Blog';
        return view('backend.blog.add',$data);
    }

    public function insert(Request $request)
    {
        // dd($request->all());
        $save = new Blog;
        $save->title = trim($request->title);
    }
}
