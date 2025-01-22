<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use str;

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
        $save->category_id = trim($request->category_id);
        $save->description = trim($request->description);
        $save->meta_description = trim($request->meta_description);
        $save->meta_keywords = trim($request->meta_keywords);
        $save->is_publish = trim($request->is_publish);
        $save->status = trim($request->status);
        $save->save();

        $slug = str::slug($request->title);
        
        $checkslug = Blog::where('slug', '=', $slug)->first();
        if(!empty($checkslug))
        {
            $dbslug = $slug.'-'.$save->id;
        }
        else
        {
            $dbslug = $slug;
        }
        $save->slug = $dbslug;

        if(!empty($request->file('image_file')))
        {
            $ext = $request->file('image_file')->getClientOriginalExtension();
            $file = $request->file('image_file');
            $filename = $dbslug.'.'.$ext;
            $file->move('upload/blog/', $filename);
            $save->image_file = $filename;
        }
        $save->save();

        return redirect('palel/blog/list')->with('success', 'Blog successfully created');
        
    }
}
