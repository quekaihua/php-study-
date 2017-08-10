<?php
interface mobile{
	public function run();
}
class plain implements mobile{
	public function run(){
		echo "I am a plain.\n";
	}

	public function fly(){
		echo "fly.\n";
	}
}
class car implements mobile{
	public function run(){
		echo "I am a car.\n";
	}
}
class machine{
	function demo(mobile $a){
		$a->fly();
	}
}

$obj = new machine();
$obj->demo(new plain());
$obj->demo(new car());
