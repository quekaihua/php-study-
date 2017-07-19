<?php
//类的属性和方法可以同名，因为他们不存在同个“命名空间”内

class Foo{
	
	public $bar = 'property';

	public function bar(){
		return 'method';
	}
}

$obj = new Foo();

echo $obj->bar, PHP_EOL, $obj->bar(), PHP_EOL;