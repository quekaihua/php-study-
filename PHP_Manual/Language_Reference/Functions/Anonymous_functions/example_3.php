<?php
$message = 'hello';

// $example = function(){
// 	var_dump($message);
// };

// $example();

$example = function() use ($message){
	var_dump($message);
};

$example();

$message = 'world';
$example();

$message = 'hello';
