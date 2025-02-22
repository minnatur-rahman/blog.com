<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        $save->slug = trim(Str::slug($request->name));
        $save->title = trim($request->title);
        $save->meta_title = trim($request->meta_title);
        $save->meta_description = trim($request->meta_description);
        $save->meta_keywords = trim($request->meta_keywords);
        $save->status = trim($request->status);
        $save->save();

        return redirect('panel/category/list')->with('success', 'Category store successfully');
    }

    public function edit($id, Request $request)
    {
        $data['getRecord'] = Category::getSingle($id);
        $data['meta_title'] = 'Edit Category';
        return view('backend.category.edit',$data);
    }

    public function update($id, Request $request)
    {
        $save = Category::getSingle($id);
        $save->name = trim($request->name);
        $save->slug = trim(Str::slug($request->name));
        $save->title = trim($request->title);
        $save->meta_title = trim($request->meta_title);
        $save->meta_description = trim($request->meta_description);
        $save->meta_keywords = trim($request->meta_keywords);
        $save->status = trim($request->status);
        $save->save();

        return redirect('panel/category/list')->with('success', 'Category successfully updated');
    }

    public function delete($id)
    {
        $save = Category::getSingle($id);
        $save->is_delete = 1;
        $save->save();

        return redirect()->back()->with('success', 'Category successfully deleted');
    }
}
