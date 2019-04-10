<?php

Route::group(['prefix'=>'ecommerce'],function (){


//apply mainentance middleware in all routes in website
    Route::group(['middleware'=>'mainentance'],function (){

        Route::get('/', function () {
            return view('style.home');
        });

    });

//display mainentance page
    Route::get('mainentance',function (){
        if(settings()->status=='open'){
            return redirect('/ecommerce');
        }else {
            return view('style.mainentance');
        }
    });






});

