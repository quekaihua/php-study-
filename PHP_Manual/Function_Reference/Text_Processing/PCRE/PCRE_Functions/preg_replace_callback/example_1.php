<?php
$fp = fopen("test.text", "r") or die("can't read test.text");
while(!feof($fp)){
	$line = fgets($fp);
	$line = preg_replace_callback(
		'|<p>\s*\w|',
		function($matches){
			return strtolower($matches[0]);
		},
		$line
	);
	echo $line;
}

fclose($fp);