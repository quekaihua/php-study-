<?php
$str = "first=value&arr[]=foo+bar&arr[]=baz";

parse_str($str, $output);
print_r($output);
print_r(parse_str($str));
echo $first;
echo $arr[0];
echo $arr[1];
