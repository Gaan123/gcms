<?php
if (!function_exists('serialNumbers')):
function serialNumbers($perPage,$currentPage,$key){
    return ($currentPage-1)*$perPage+$key+1;
}
endif;

