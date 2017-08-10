<?php
interface foo{}
class bar implements foo{}

print_r(class_implements(new bar));

print_r(class_implements('bar'));

function __autoload($class_name){
    require_once $class_name. '.php';
}

print_r(class_implements('not_load', true));