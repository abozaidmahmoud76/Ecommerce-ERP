<?php

namespace App\Http\Controllers\Admin;

use App\Model\City;
use App\Model\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\StateDatatable;
use App\Model\State;
use Mail;
use Form;
use App\Mail\sendMail;

class StateController extends Controller
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

    public function index(StateDatatable $state)
    {
        return $state->render('admin.states.listStates',['title'=>'state datatable']);
    }


    public function create(Request $req)
    {
        if($req->ajax()) {
            if ($req->country_id) {
                $cites=City::where('country_id',(int)$req->country_id)->pluck('city_name_en');
                if(count($cites)>0) {
                    $select=$req->has('select')?$req->select:'';
                    return Form::select('city_id',City::where('country_id',(int)$req->country_id)->pluck('city_name_'.lang(),'id'),6,['class'=>'form-control']);
                }else{
                    return Form::select('city_id',City::where('country_id',(int)$req->country_id)->pluck('city_name_en','id'),null,['class'=>'form-control','placeholder'=>'...']);
                }
            }
        }
        $countries=Country::all();
        return view('admin.states.create',['title'=>__('admin.Add'),'countries'=>$countries]);
    }





    public function store(Request $req)
    {
       $validate=$this->validate($req,[
           'state_name_ar'=>'required|string',
           'state_name_en'=>'required|string',
           'country_id'=>'required',
           'city_id'=>'required',


       ]);

       State::create($validate);
       session()->flash('success','state created successfully');
       return back();
    }


    public function show($id)
    {
    }


    public function edit($id)
    {
        $countries=Country::all();
        $item=State::find($id);
       return view('admin.states.edit',['title'=>'Edit State','item'=>$item,'countries'=>$countries]);
    }


    public function update(Request $req, $id)
    {
        $validate=$this->validate($req,[
            'state_name_ar'=>'required|string',
            'state_name_en'=>'required|string',
            'country_id'=>'required',
            'city_id'=>'required|numeric',

        ]);
      $item= State::find($id);
        State::find($id)->update($validate);
            session()->flash('success', 'State updated successfully');
            return back();
     }



    public function destroy(request $req,$id=null)
    {

     $records='';
     if($id!=null){
        State::find($id)->delete();
        $records='record';
     }else{
         State::destroy($req->item_checkbox);
        $records='records';
     }
        session()->flash('success',$records .' deleted successfully');
        return back();
    }
}
