<?php
echo PHP_INT_SIZE, PHP_EOL;
echo PHP_INT_MAX, PHP_EOL;
echo PHP_INT_MIN, PHP_EOL;

$large_number = 9223372036854775807;
var_dump($large_number);

$large_number++;
var_dump($large_number);

$million = 1000000000000;
$large_number = 50000000 * $million;
var_dump($large_number);