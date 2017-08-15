<?php
$array1 = array("a" => "green", "red", "blue");
$array2 = array("a" => 'green', "yellow", "red");

$result = array_intersect_assoc($array1, $array2);
print_r($result);
