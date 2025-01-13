<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function user()
    {
        $data['getRecord'] = User::getRecordUser();
        $data['meta_title'] = 'Uaer List';
        return view('backend.user.list',$data);
    }

    public function add()
    {
        $data['meta_title'] = 'Add User';
        return view('backend.user.add',$data);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $save = new User;
        $save->name = trim($request->name);
        $save->email = trim($request->email);
        $save->password = Hash::make($request->password);
        $save->status = trim($request->status);
        $save->save();

        return redirect()->route('user.list')->with('success', 'Data store successfully');
    }

    public function edit($id, Request $request)
    {
        $data['getRecord'] = User::getSingle($id);
        $data['meta_title'] = 'Add Edit';
        return view('backend.user.edit',$data);
    }

    public function update($id, Request $request)
    {
          // dd($request->all());
          $save = User::getSingle($id);
          $save->name = trim($request->name);
          $save->email = trim($request->email);
          if(!empty($request->password))
          {
            $save->password = Hash::make($request->password);
          }
         
          $save->status = trim($request->status);
          $save->save();
  
          return redirect()->route('user.list')->with('success', 'Data updated successfully');
    }

    public function delete($id)
    {
        $save = User::getSingle($id);
        $save->delete();
        return redirect()->route('user.list')->with('success', 'Data deleted successfully');
    }

}
