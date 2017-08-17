<?php
function unserialize_handler($errno, $errstr){
    echo "Invalid serialized value.\n";
}
set_error_handler("unserialize_handler");
$serialized = 'foo';
$original = unserialize($serialized);
var_dump($original);
restore_error_handler();
