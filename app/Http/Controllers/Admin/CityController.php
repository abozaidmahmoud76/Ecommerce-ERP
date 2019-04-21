<?php

namespace App\Http\Controllers\Admin;

use App\Model\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\CityDatatable;
use App\Model\City;
use Mail;
use App\Mail\sendMail;

class CityController extends Controller
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

    public function index(CityDatatable $city)
    {
        return $city->render('admin.cities.listCities',['title'=>'city datatable']);
    }


    public function create()
    {
        $countries=Country::all();
        return view('admin.cities.create',['title'=>__('admin.Add'),'countries'=>$countries]);
    }





    public function store(Request $req)
    {
       $validate=$this->validate($req,[
           'city_name_ar'=>'required|string',
           'city_name_en'=>'required|string',
           'country_id'=>'required',


       ]);


       City::create($validate);
       session()->flash('success','city created successfully');
       return back();
    }


    public function show($id)
    {
    }


    public function edit($id)
    {
       $countries=Country::all();
       $item=City::find($id);
       return view('admin.cities.edit',['title'=>'Edit City','item'=>$item,'countries'=>$countries]);
    }


    public function update(Request $req, $id)
    {


        $validate=$this->validate($req,[
            'city_name_ar'=>'required|string',
            'city_name_en'=>'required|string',
            'country_id'=>'required'

        ]);
      $item= City::find($id);
        City::find($id)->update($validate);
            session()->flash('success', 'City updated successfully');
            return back();
        }



    public function destroy(request $req,$id=null)
    {

     $records='';
     if($id!=null){
        City::find($id)->delete();
        $records='record';
     }else{
         City::destroy($req->item_checkbox);
        $records='records';
     }
        session()->flash('success',$records .' deleted successfully');
        return back();
    }
}
