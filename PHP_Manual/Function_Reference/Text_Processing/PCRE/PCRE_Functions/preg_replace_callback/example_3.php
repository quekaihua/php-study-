<?php
#preg_replace_callback using recursive structure to handle encapsulated BB code
#好难理解
$input = "plain [indent] deep [indent] deeper [/indent] deep [/indent] plain";

function parseTagsRecursive($input){
	$regex = '#\[indent]((?:[^[]|\[(?!/?indent])|(?R))+)\[/indent]#';
	$regex = '#\[indent](*)?\[/indent]#';
	print_r($input);
	if(is_array($input)){
		$input = '<div style="margin-left:10px">' . $input[1] . '</div>';
	}
	return preg_replace_callback($regex, 'parseTagsRecursive', $input);
}

$output = parseTagsRecursive($input);
echo $output;