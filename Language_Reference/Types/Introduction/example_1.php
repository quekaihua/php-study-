<?php
$a_bool = true;
$a_str  = "foo";
$a_str2 = 'foo';
$an_int = 12;

echo gettype($a_bool);
echo gettype($a_str);

if(is_int($an_int)){
	$an_int += 4;
}

if(is_string($a_bool)){
	echo "String: $a_bool";
}