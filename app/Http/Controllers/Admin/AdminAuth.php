<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\resetPassword;
use App\Model\Admin;
use Auth;
use DB;
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
            $token=app('auth.password.broker')->createToken($admin);
            $data=DB::table('password_resets')->insert([
               'email'=>$admin->email,
               'token'=>$token,
                'created_at'=>Carbon::now()
            ]);
            return new resetPassword(['data'=>$admin,'token'=>$token]);
        }
        return back();
    }
}
