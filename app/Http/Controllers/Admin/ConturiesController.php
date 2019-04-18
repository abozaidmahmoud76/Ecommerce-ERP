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
           'logo'=>v_image(),

       ]);
        if($req->has('logo')){
            $logo=upload()->upload([
                'file'=>'logo',
                'path'=>'country',
                'upload_type'=>'single',
//                'delete_file'=>''
            ]);
            $validate['logo']=$logo;
        }

        Country::create($validate);
       session()->flash('success','country created successfully');
       return back();
    }


    public function show($id)
    {
    }


    public function edit($id)
    {
       $item=Country::find($id);
       return view('admin.countries.edit',['title'=>'Edit Country','item'=>$item]);
    }


    public function update(Request $req, $id)
    {


        $validate=$this->validate($req,[
            'country_name_ar'=>'required|string',
            'country_name_en'=>'required|string',
            'mob'=>'required',
            'code'=>'required',
            'logo'=>v_image(),

        ]);
      $item= Country::find($id);
        if($req->has('logo')){
            $logo=upload()->upload([
                'file'=>'logo',
                'path'=>'country',
                'upload_type'=>'single',
                'delete_file'=>$item->logo,
            ]);
            $validate['logo']=$logo;
        }



        Country::find($id)->update($validate);
            session()->flash('success', 'Country updated successfully');
            return back();
        }



    public function destroy(request $req,$id=null)
    {

     $records='';
     if($id!=null){
        Country::find($id)->delete();
        $records='record';
     }else{
         Country::destroy($req->item_checkbox);
        $records='records';
     }
        session()->flash('success',$records .' deleted successfully');
        return back();
    }
}
