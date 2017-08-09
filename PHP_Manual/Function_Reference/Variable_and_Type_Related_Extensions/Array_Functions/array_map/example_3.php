<?php
function show_Spanish($n, $m){
	return("The number $n is called $m in Spanish");
}

function map_Spanish($n, $m){
	return(array($n => $m));
}

$a = array(1, 2, 3, 4, 5);
$b = array("uno", "dos", "tres", "cuatro", "cinco");

$c = array_map("show_Spanish", $a, $b);
print_r($c);

$d = array_map("map_Spanish", $a, $b);
print_r($d);

$e = array_merge($a, $b);
print_r($e);


$couponKeys = array(
	'85D2EB6C067E3E328721BDC3F1E3F030',
	'E13765AD60F3BB8A7C39515C9B25D37C',
	'AD007BB8A20EAD4A273F76CA31C2D588',
	'3483D968C038734B1D2D256DEC60AA0F'
);

$uid = 1222;
$event_key = 'GAME_TYPE_OF_FDF';

// $callback = function($n) use ($uid, $event_key) {
// 	// return $n . $uid . $event_key;
// 	$array['couponKeys'] = $n;
// 	$array['uid'] = $uid;
// 	$array['event_key'] = $event_key;
// 	return $array;
// };
// $res = array_map($callback, $couponKeys);
// print_r($res);

$res = array_map(function($n) use ($uid, $event_key){
	return array(
		'coupon_key' => $n,
		'uid' => $uid,
		'event_key' => $event_key
		);
}, $couponKeys);

print_r($res);