<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\File;

class UploadController extends Controller
{
    public function upload($request,$path,$new_name=null){
        $new_name=$new_name===null?time():$new_name;
    }
}
