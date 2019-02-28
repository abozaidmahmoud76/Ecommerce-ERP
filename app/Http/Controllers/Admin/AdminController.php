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
       $item=new Admin();
       $item->name=$req->name;
       $item->email=$req->email;
       $item->password=bcrypt($req->password);
       $item->save();
       return back();
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy(request $req)
    {
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
