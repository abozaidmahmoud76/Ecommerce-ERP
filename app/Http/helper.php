<?php

//define adminUrl fun for dynamic url for admin.
if(!function_exists('adminUrl')) {
    function adminUrl($url = null)
    {
        return url('admin/' . $url);
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
        $lang=session()->has('lang')?session('lang'):'ar';
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
            "sUrl"=>__('admin.url'),
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