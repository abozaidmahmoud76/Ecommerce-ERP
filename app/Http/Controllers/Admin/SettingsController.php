<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Model\Settings;

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
           $logo=upload($req->logo,'settings');
           $data['logo']=$logo;
       }
       if($req->has('icon')){
           $icon=upload($req->icon,'settings');
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
