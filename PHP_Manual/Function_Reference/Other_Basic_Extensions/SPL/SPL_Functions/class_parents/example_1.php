<?php
class foo{}
class bar extends foo{}

print_r(class_parents(new bar));

print_r(class_parents('bar'));

function __autoload($class){
	require_once $class . '.php';
}

print_r(class_parents(new b(), false));
