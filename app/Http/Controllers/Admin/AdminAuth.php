<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\resetPassword;
use App\Model\Admin;
use Auth;
use DB;
use Mail;
use Session;
use Carbon\Carbon;

class AdminAuth extends Controller
{
    public function login(){
        return view('admin.login');
    }

    public function doLogin(Request $req){
        $credential=[ 'email'=>$req->email,'password'=>$req->password];
        $remember_me= $req->remember_me==1 ? true : false;
        if(admin()->attempt($credential,$remember_me))
           {
                return redirect(adminUrl());
            }else{
            session()->flash('invalid_login',trans('admin.invalid_login'));
                return redirect(adminUrl('login'));
            }
    }

    public function logout(){
        admin()->logout();
        return redirect(adminUrl('login'));
    }

    public  function forget_password(){
        return view('admin.forget_password');
    }

    public function forget_password_post(){
        $admin=Admin::where('email',request('email'))->first();
        if(!empty($admin)){
            $token=app('auth.password.broker')->createToken($admin); //create dynamic useing brocker
            //insert token in table to check if token not exceed define time for its valid.
            $data=DB::table('password_resets')->insert([
               'email'=>$admin->email,
               'token'=>$token,
               'created_at'=>Carbon::now()
            ]);
            Mail::to($admin->email)->send(new resetPassword(['data'=>$admin,'token'=>$token]));
            Session::flash('admin_reset_password',trans('admin.reset_password'));
            return redirect(adminUrl('login'));
        }
        return back();
    }

    public function reset_password($token){
        $check_token=DB::table('password_resets')->where('token',$token)->where('created_at','>',Carbon::now()->subDay(1))->first();
       if($check_token){
           return view('admin.reset_password',['data'=>$check_token]);
       }else{
           return redirect(adminUrl('forget/password'));
       }

    }


    public function update_password(request $req,$token){
        $validate=$this->validate($req,[
           'password'=>'required|confirmed',
           'password_confirmation'=>'required'
        ]);
        $check_token=DB::table('password_resets')->where('token',$token)->where('created_at','>',Carbon::now()->subDay(1))->first();

        if($check_token) {
            $admin = Admin::where('email', $req->email)->update(['password'=>bcrypt($req->password)]);
            DB::table('password_resets')->where('email',$check_token->email)->delete();
            return redirect(adminUrl('login'));
        }else{
            return redirect(adminUrl('forget/password'));
        }
    }

}
