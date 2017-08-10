<?php
/*
Note:
Autoloading is not available if using PHP in CLI interactive mode.
*/
spl_autoload_register(function($class_name){
	include $class_name . '.php';
});

$obj = new MyClass1();
$obj = new MyClass2();