<?php

$func = function($arg1, $arg2){
    return $arg1 * $arg2;
};

var_dump(call_user_func_array($func, [2, 4]));

