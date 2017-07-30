<?php
// Some string examples

$str = 'This is a test.';
$first = $str[0];

$third = $str[2];

$str = 'This is still a test.';
$last = $str[strlen($str)-1];

$str = 'Look at the sea';
$str[strlen($str)-1] = 'e';

var_dump($first);
var_dump($third);
var_dump($last);
var_dump($str);