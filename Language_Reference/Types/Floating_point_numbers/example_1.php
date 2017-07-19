<?php
//比较两个小数在一定精度内相等

//有些运算会导致出现NAN, 用is_nan()函数检测结果
$a = 1.23456789;
$b = 1.23456780;

$epsilon = 0.000000001;

if(abs($a-$b) < $epsilon){
	echo "true";
}

var_dump(NAN);
var_dump(is_nan(NAN));