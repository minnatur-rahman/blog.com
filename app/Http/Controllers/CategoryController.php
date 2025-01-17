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

    public function store(Request $request)
    {
        $save = new Category;
        $save->name = trim($request->name);
        $save->title = trim($request->title);
        $save->meta_title = trim($request->meta_title);
        $save->meta_description = trim($request->meta_description);
        $save->meta_keywords = trim($request->meta_keywords);
        $save->status = trim($request->status);
        $save->save();

        return redirect('panel/category/list')->with('success', 'Data store successfully');
    }
}
