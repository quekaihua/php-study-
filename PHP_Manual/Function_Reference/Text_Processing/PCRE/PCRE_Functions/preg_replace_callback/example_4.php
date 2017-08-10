<?php
$pattern = '/1\d{10}/';

$tel = 'fdh1895018011414800000000';

$tel_callback = function($matches){
	return 'tel';
};

$res = preg_replace_callback($pattern, $tel_callback, $tel);
var_dump($res);
