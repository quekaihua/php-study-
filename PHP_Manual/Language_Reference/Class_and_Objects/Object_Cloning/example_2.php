<?php

class MyClass{public $var = 1;}

$obj1 = new MyClass();
$obj2 = clone $obj1;
$obj2->var = 2;
print $obj1->var;
