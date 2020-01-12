<?php
if (!function_exists('serialNumbers')):
function serialNumbers($perPage,$currentPage,$key){
    return ($currentPage-1)*$perPage+$key+1;
}
endif;

if (!function_exists('sortUrl')):
function sortUrl(string $column):string{
    $order='asc';
    if (request('order')=='asc'){
        $order='desc';
    }else{
        $order='asc';
    }

    if(\Request::fullUrl()==url()->current()){
        return url()->current().'?orderby='.$column.'&order='.$order;
    }elseif (request()->orderby == 'title'){

        return str_replace(request('order'),$order,\Request::fullUrl());
    }
    return \Request::fullUrl().'&orderby='.$column.'&order='.$order;
}
endif;


