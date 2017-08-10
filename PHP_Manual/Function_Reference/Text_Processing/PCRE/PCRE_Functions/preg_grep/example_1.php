<?php
$array = [.23, 0.34, 3, 56, 4.7];
$fl_array = preg_grep("|(\d+)?\.\d+$|", $array);
var_export($fl_array);