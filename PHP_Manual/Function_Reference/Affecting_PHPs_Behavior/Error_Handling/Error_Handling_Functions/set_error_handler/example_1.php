<?php
function myErrorHandler($errno, $errstr, $errfile, $errline){
    if(!(error_reporting() & $errno)){
    	return false;
    }

    switch($errno){
        case E_USER_ERROR:
		echo 'My ERROR [$errno] $errstr\n';
		echo " Fatal error on line $errline in file $errfile";
		echo ", PHP " . PHP_VERSION . "(" . PHP_OS . ")\n";
	        echo "Aborting ...\n";
		exit(1);
		break;	
	case E_USER_WARNING:
		echo "My WARNING [$errno] $errstr\n";break; 
	case E_USER_NOTICE:
		echo "My NOTICE [$errno] $errstr\n";break;
	default:
		echo "Unknown error type: [$errno] $errstr\n";
    }
    return true;
}

function scale_by_log($vect, $scale){
    if(!is_numeric($scale) || $scale <= 0){
    	trigger_error("log(x) for x <=0 is undefined, you used: scale = $scale", E_USER_ERROR);
    }

    if(!is_array($vect)){
    	trigger_error("Incorrect input vector, array of values expected", E_USER_WARNING);
	return null;
    }

    $temp = [];

    foreach($vect as $pos => $value){
    	if(!is_numeric($value)){
	    trigger_error("Value $errno at position $pos is not a number, using 0 (zero)", E_USER_NOTICE);
	    $value = 0;
	}
	$temp[$pos] = log($scale) * $value;
    }

    return $temp;
}

$old_error_handler = set_error_handler("myErrorHandler");
restore_error_handler();
echo "vector a\n";
$a = [2, 3, "foo", 5.5, 43.3, 21.11];
print_r($a);

echo "-----\nvector b -a notice (b = log(PI) * a)\n";
$b = scale_by_log($a, M_PI);
print_r($b);

echo "-----\nvector c -a warning (b = log(PI) * a)\n";
$c = scale_by_log("not array", 2.3);
var_dump($c);

echo "-----\nvector d - notice fatal error\n";

$d = scale_by_log($a, -2.5);
var_dump($d);
