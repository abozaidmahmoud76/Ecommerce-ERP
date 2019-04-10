<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\CountryDatatable;
use App\Model\Country;
use Mail;
use App\Mail\sendMail;

class ConturiesController extends Controller
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

    public function index(CountryDatatable $country)
    {
        return $country->render('admin.countries.listCountries',['title'=>'country datatable']);
    }


    public function create()
    {
        return view('admin.countries.create',['title'=>__('admin.Add')]);
    }





    public function store(Request $req)
    {
       $validate=$this->validate($req,[
           'country_name_ar'=>'required|string',
           'country_name_en'=>'required|string',
           'mob'=>'required',
           'code'=>'required',
           'logo'=>'',

       ]);
      Country::create($validate);
       session()->flash('success','country created successfully');
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


    public function destroy(request $req,$id=null)
    {
        
     $records='';
     if($id!=null){
        Admin::find($id)->delete();
        $records='record';
     }else{
        Admin::destroy($req->item_checkbox);
        $records='records';
     }
        session()->flash('success',$records .' deleted successfully');
        return back();
    }
}
