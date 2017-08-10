<?php
interface employee{
	public function working();
}

class teacher implements employee{
	public function working(){
		echo "teaching\n";
	}
}

class coder implements employee{
	public function working(){
		echo "coding\n";
	}
}

function doprint(employee $i){
	$i->working();
}
$a = new teacher();
$b = new coder();
doprint($a);
doprint($b);

