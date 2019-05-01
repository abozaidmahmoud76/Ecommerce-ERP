<?php

namespace App\Http\Controllers\Admin;

use App\Model\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\DepartmentDatatable;
use App\Model\Department;
use Mail;
use App\Mail\sendMail;

class DepartmentController extends Controller
{

    public function send(){
        // Mail::send(
        //     ['text'=>'admin.edit'],
        //    ['name'=>'my custom name'],
        //     function($msg){
        //         $msg->to('m.abuzaid@mu.edu.sa','hoda abozaid')->subject('admin sent mail to outlook');
        //         $msg->from('abozaidmahmoud76@gmail.com','admin user');
        //     }
     //   );

          return view('admin.sendMail');

    }

    public function sendPost(Request $req){
        // Mail::send(
        //     ['text'=>'admin.edit'],
        //    ['name'=>'my custom name'],
        //     function($msg){
        //         $msg->to('m.abuzaid@mu.edu.sa','hoda abozaid')->subject('admin sent mail to outlook');
        //         $msg->from('abozaidmahmoud76@gmail.com','admin user');
        //     }
     //   );


         Mail::send(new SendMail($req));

    }

    public function index()
    {

    }


    public function create()
    {
        return view('admin.departments.create',['title'=>__('admin.Add')]);
    }





    public function store(Request $req)
    {
       $validate=$this->validate($req,[
           'dep_name_ar'=>'required|string',
           'dep_name_en'=>'required|string',
           'icon'=>'sometimes|nullable',
           'description'=>'sometimes|nullable',
           'keyword'=>'sometimes|nullable',
           'parent_id'=>'sometimes|nullable',
       ]);


       Department::create($validate);
       session()->flash('success','department created successfully');
       return back();
    }


    public function show($id)
    {
    }


    public function edit($id)
    {
       $item=Department::find($id);
       return view('admin.departments.edit',['title'=>'Edit Department','item'=>$item]);
    }


    public function update(Request $req, $id)
    {
        $validate=$this->validate($req,[
            'dep_name_ar'=>'required|string',
            'dep_name_en'=>'required|string',
            'icon'=>'sometimes|nullable',
            'description'=>'sometimes|nullable',
            'keyword'=>'sometimes|nullable',
            'parent_id'=>'sometimes|nullable',
        ]);

        Department::find($id)->update($validate);
            session()->flash('success', 'Department updated successfully');
            return back();
        }



    public function destroy(request $req,$id=null)
    {

     $records='';
     if($id!=null){
        Department::find($id)->delete();
        $records='record';
     }else{
         Department::destroy($req->item_checkbox);
        $records='records';
     }
        session()->flash('success',$records .' deleted successfully');
        return back();
    }
}
