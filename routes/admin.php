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

//        settings route
        Route::get('website/settings','SettingsController@index');
        Route::post('website/settings','SettingsController@update_settings');

//admin route
        Route::resource('admin','AdminController');
        Route::post('delete/all','AdminController@destroy');
        Route::get('create','AdminController@create');

        Route::resource('user','UserController');
        Route::post('user/delete/all','UserController@destroy');
        Route::get('create','UserController@create');

//country routes
        Route::resource('countries','ConturiesController');
        Route::post('country/delete/all','ConturiesController@destroy');

//city routes
        Route::resource('cities','CityController');
        Route::post('city/delete/all','CityController@destroy');

//state routes
        Route::resource('states','StateController');
        Route::post('state/delete/all','StateController@destroy');

//departments routes
        Route::resource('departments','DepartmentController');
        Route::post('department/delete/all','DepartmentController@destroy');



        // //send email
        // Route::get('send','AdminController@send');
        // Route::post('send','AdminController@sendPost');
    });



});

