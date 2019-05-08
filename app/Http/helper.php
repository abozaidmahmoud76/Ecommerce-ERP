<?php
use App\Model\Settings;
//define adminUrl fun for dynamic url for admin.
if(!function_exists('adminUrl')) {
    function adminUrl($url = null)
    {
        return url('admin/' . $url);
    }
}

//return settings of website
if(!function_exists('settings')) {
    function settings()
    {
        return Settings::first();
    }
}


//make upload class as helper function user in any place
if(!function_exists('upload')) {
    function upload()
    {
        return new App\Http\Controllers\Admin\UploadController;
    }
}



//make upload class as helper function user in any place
if(!function_exists('load_department')) {
    function load_department($select=null,$id=null)
    {
        $departments=App\Model\Department::selectRaw('dep_name_'.lang()." as text")->
            selectRaw('id as id')->selectRaw('parent as parent')->get();
        $dept_arr=[];
        if($departments) {
            foreach ($departments as $department) {
                $list_arr = [];

                if (!$department->childs->isEmpty()) {
                    $list_arr['icon'] = "glyphicon glyphicon-tree-deciduous";
                } else {
                    $list_arr['icon'] = "glyphicon glyphicon-leaf";

                }
                $list_arr['li_attr'] = '';
                $list_arr['a_attr'] = '';
                $list_arr['children'] = [];


                if ($select !== null && $select == $department->id) {
                    $list_arr['state'] = [
                        'opened' => true,
                        'selected' => true,
                    ];
                }

                if ($id !== null && $id == $department->id) {

                    $list_arr['state'] = [
                        'opened' => false,
                        'selected' => 'false',
                        'disabled' => 'true',
                        'hidden' => true,
                    ];
                }

                $list_arr['id'] = $department->id;
                $list_arr['parent'] = $department->parent !== null ? $department->parent : "#";
                $list_arr['text'] = $department->text;
                array_push($dept_arr, $list_arr);

            }
        }
        return json_encode($dept_arr,JSON_UNESCAPED_UNICODE);
    }
}


////upload files and img
//if(!function_exists('upload')) {
//    function upload($file,$folder)
//    {
//        $filename=$file->getClientOriginalName().'_'.time();
//        $dest=public_path('/upload');
//        if(!file_exists($dest)){
//            mkdir($dest,0777,true);
//        }
//
//        if(!file_exists($dest.'/'.$folder)){
//            mkdir($dest.'/'.$folder,0777,true);
//        }
//
//        $file->move($dest.'/'.$folder,$filename);
//        return $filename;
//    }
//}


//validate image
if(!function_exists('v_image')) {
    function v_image($ext=null)
    {
        if($ext===null){
            return 'image|mimes:jpg,jpeg,png';
        }else{
            return 'image|'.$ext;
        }
    }
}

//return guard admin
if(!function_exists('admin')) {
    function admin()
    {
        return Auth::guard('admin');
    }
}

//return lang
if(!function_exists('lang')) {
    function lang()
    {
        $lang=session()->has('lang')?session('lang'):@settings()->main_lang ;
        return $lang;
    }
}

//return page direction
if(!function_exists('direction')) {
    function direction()
    {
        $direction=session('lang')=='ar'?'rtl':'ltr';
        return $direction;
    }
}



//return datatable lang setting
if(!function_exists('datatable_language')) {
    function datatable_language()
    {
        return [
            "sProcessing"=>__('admin.precessing'),
            "sLengthMenu"=>__('admin.lengthMenu'),
            "sZeroRecords"=>__('admin.zeroRecord'),
            "sEmptyTable"=>__('admin.emptyTable'),
            "sInfo"=>__('admin.info'),
            "sInfoEmpty"=>__('admin.infoEmpty'),
            "sInfoFiltered"=>__('admin.infoFilterd'),
            "sInfoPostFix"=>__('admin.infoPostFix'),
            "sSearch"=>__('admin.search'),
            "sUrl"=>__(' admin.url'),
            "sInfoThousands"=>__('admin.infoThounds'),
            "sLoadingRecords"=>__('admin.loadRecord'),
            "oPaginate"=> [
                "sFirst"=> __('admin.first'),
                "sLast"=> __('admin.last'),
                "sNext"=> __('admin.next'),
                "sPrevious"=> __('admin.previous')
            ],

        ];
    }
}