<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\TradeBrandDatatable;
use App\Model\TradeBrand;
use Mail;
use App\Mail\sendMail;
use Storage;

class TradeBrandController extends Controller
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

    public function index(TradeBrandDatatable $tradeBrand)
    {

        return $tradeBrand->render('admin.tradeBrands.listBrands',['title'=>'brands datatable']);
    }


    public function create()
    {
        return view('admin.tradeBrands.create',['title'=>__('admin.Add')]);
    }





    public function store(Request $req)
    {
       $validate=$this->validate($req,[
           'brand_name_ar'=>'required|string|min:3|max:50',
           'brand_name_en'=>'required|string|min:3|max:50',
           'logo'=>v_image(),

       ]);
        if($req->has('logo')){
            $logo=upload()->upload([
                'file'=>'logo',
                'path'=>'brands',
                'upload_type'=>'single',
            ]);
            $validate['logo']=$logo;
        }

        TradeBrand::create($validate);
       session()->flash('success','Brand created successfully');
       return back();
    }


    public function show($id)
    {
    }


    public function edit($id)
    {
       $item=TradeBrand::find($id);
       return view('admin.tradeBrands.edit',['title'=>'Edit TradeBrand','item'=>$item]);
    }


    public function update(Request $req, $id)
    {
        $validate=$this->validate($req,[
            'brand_name_ar'=>'required|string|min:3|max:50',
            'brand_name_en'=>'required|string|min:3|max:50',
            'logo'=>v_image(),
        ]);


      $item= TradeBrand::find($id);
        if($req->has('logo')){
            $logo=upload()->upload([
                'file'=>'logo',
                'path'=>'brands',
                'upload_type'=>'single',
                'delete_file'=>$item->logo,
            ]);
            $validate['logo']=$logo;
        }



        $item->update($validate);
            session()->flash('success', 'TradeBrand updated successfully');
            return back();
        }



    public function destroy(request $req,$id=null)
    {

     $records='';
     if($id!=null){
           $brand= TradeBrand::find($id);
           Storage::delete($brand->logo);
           $brand->delete();
           $records='record';
     }else{
         $brands=TradeBrand::whereIn('id',$req->item_checkbox)->get();
         foreach ($brands as $brand){
             Storage::delete($brand->logo);
         }
         TradeBrand::destroy($req->item_checkbox);
         $records='records';
     }
        session()->flash('success',$records .' deleted successfully');
        return back();
    }
}
