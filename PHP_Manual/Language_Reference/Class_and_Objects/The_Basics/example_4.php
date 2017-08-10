<?php
/* 当对象赋值给一个新变量的时候，新变量会访问同一个实例
 When assigning an already created instance of a class to a new
 variable, the new variable will access the same instance as the
 object that was assigned.
*/

include 'example_1.php';

$instance = new SimpleClass();

$assigned = $instance;
$reference = &$instance;

$instance->var = '$assigned will have this value.';

$instance = null;

var_dump($instance);
var_dump($reference);
var_dump($assigned);
