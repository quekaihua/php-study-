<?php
//error_reporting(1);
//error_log(E_ALL);
class A{
	function foo(){
		if(isset($this)){
			echo '$this is defined (';
			echo get_class($this);
			echo ")\n";
		}else{
			echo "\$this is not defined.\n";
		}
	}
}

class B{
	function bar(){
		A::foo();
	}
}

A::foo();
$b = new B();
$b->bar();

B::bar();