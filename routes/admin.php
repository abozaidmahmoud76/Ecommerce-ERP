<?php


Route::group(['prefix'=>'admin','namespace'=>'Admin'],function (){

    Config::set('auth.defines','admin'); //set default guard admin for user in auth
    //admin login
    Route::get('/login','AdminAuth@login');
    Route::post('/login','AdminAuth@doLogin');


    Route::get('forget/password','AdminAuth@forget_password');
    Route::post('forget/password','AdminAuth@forget_password_post');
    Route::get('reset/password/{token}','AdminAuth@reset_password');
    Route::post('update/password/{token}','AdminAuth@update_password');

    Route::group(['middleware'=>'admin:admin'],function(){

        Route::get('/',function (){
            return view('admin.home',['title'=>'admin home']);
        });

        Route::get('lang/{lang}',function ($lang){
            session()->put('lang',$lang);
            return back();
        });

        Route::any('logout','AdminAuth@logout');


        //admin routes
        Route::resource('admin','AdminController');
        Route::get('create','AdminController@create');




        //user routes
        Route::resource('user','UserController');
        Route::get('user/create','UserController@create');
        Route::post('delete/all','UserController@destroy');


     




//        //send email
//        Route::get('send','AdminController@send');
//        Route::post('send','AdminController@sendPost');
    });



});

