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
