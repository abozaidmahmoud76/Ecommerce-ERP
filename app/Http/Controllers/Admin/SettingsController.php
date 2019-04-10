<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Model\Settings;
use Storage;

class SettingsController extends Controller
{
   public function index(){
       $item=Settings::orderBy('id','dsec')->first();
       return view('admin.settings',['title'=>'settings','item'=>$item]);
   }

   public function update_settings(Request $req){
       $this->validate($req,[
           'logo'=>v_image(),
           'icon'=>v_image(),
       ]);
       $data=$req->except('_token','_method');
       if($req->has('logo')){
           $logo=upload()->upload([
               'file'=>'logo',
               'path'=>'settings',
               'upload_type'=>'single',
               'delete_file'=>settings()->logo,
           ]);
           $data['logo']=$logo;
       }


       if($req->has('icon')){
           $icon=upload()->upload([
               'file'=>'icon',
               'path'=>'settings',
               'upload_type'=>'single',
               'delete_file'=>settings()->icon,
           ]);

           $data['icon']=$icon;

       }
       if(empty(Settings::first())){
           Settings::orderBy('id','desc')->create($data);
       }else{
           Settings::orderBy('id','desc')->update($data);

       }
       session()->flash('success','row inserted');
       return redirect(adminUrl('lang/'.settings()->main_lang));



   }
}
