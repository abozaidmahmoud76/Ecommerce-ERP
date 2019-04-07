<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Model\Settings;

class SettingsController extends Controller
{
   public function index(){
       return view('admin.settings',['title'=>'settings']);
   }

   public function update_settings(Request $req){
       $data=$req->except('_token','_method');
       if($req->has('logo')){
           upload($req->logo,'settings');
       }
       Settings::orderBy('id','desc')->update($data);
       session()->flash('success','row inserted');
       return redirect(adminUrl('website/settings'));
;


   }
}
