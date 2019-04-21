<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\File;
use Storage;
class UploadController extends Controller
{
    public  function upload($data=[]){
        if(in_array('new_name',$data)) {
            $new_name = $data['new_name'] == null ? time() : $data['new_name'];
        }
        if(request()->hasFile($data['file']) && $data['upload_type']=='single' ){
            if(Storage::has(@$data['delete_file']) && isset($data['delete_file']) ) {
               Storage::delete($data['delete_file']);
            }
            return request()->file($data['file'])->store($data['path']);
        }
    }
}
