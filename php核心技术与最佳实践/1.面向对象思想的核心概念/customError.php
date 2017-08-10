<?php
function customError($errno, $errstr, $errfile, $errline){
	echo "error code: {$errno} {$errstr}\n";
	echo "error current in line: {$errline} file {$errfile}\n";
	echo "PHP version", PHP_VERSION, "(", PHP_OS, ")\n";
	die();
}

set_error_handler("customError", E_ALL | E_STRICT);
$a = array('o'=> 2);
echo $a[o];
