<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\adminDatatable;
use App\Model\Admin;

class AdminController extends Controller
{

    public function index(adminDatatable $admin)
    {
        return $admin->render('admin.admins.index',['title'=>'admin Datatable']);
    }


    public function create()
    {
        return view('admin.admins.create',['title'=>__('admin.add')]);
    }





    public function store(Request $req)
    {
       $validate=$this->validate($req,[
           'name'=>'required|string|min:3',
           'email'=>'required|email|unique:admins',
           'password'=>'required|min:3|max:55',

       ]);
       $item=new Admin();
       $item->name=strip_tags($req->name) ;
       $item->email=strip_tags($req->email);
       $item->password=strip_tags(bcrypt($req->password));
       $item->save();
       session()->flash('success','user created successfully');
       return back();
    }


    public function show($id)
    {
    }


    public function edit($id)
    {
       $item=Admin::find($id);
       return view('admin.admins.edit',['title'=>'Edit User','item'=>$item]);
    }


    public function update(Request $req, $id)
    {
        $validate=$this->validate($req,[
            'name'=>'required|string|min:3',
            'email'=>'required|email|unique:admins,email,'.$id,
            'password'=>'sometimes|nullable|min:3|max:55',

        ]);
        $item=Admin::find($id);
        if($item) {
            $item->name = strip_tags($req->name);
            $item->email = strip_tags($req->email);
            if(!empty($req->password)) {
                $item->password = strip_tags(bcrypt($req->password));
            }
            $item->save();
            session()->flash('success', 'user updated successfully');
            return back();
        }
    }


    public function destroy(request $req)
    {
        dd('dd');
       $records=count($req->item_checkbox);
       if($records){
           if($records==1){
               Admin::find($req->item_checkbox[0])->delete();
               return back();
           }else{
               Admin::destroy($req->item_checkbox);
               return back();
           }
       }
    }
}
