<?php

// 调用存储在类属性里面的匿名函数

class Foo{

	public $bar;

	public function __construct(){
		$this->bar = function(){
			return 42;
		};
	}
}

$obj = new Foo();

$func = $obj->bar;
echo $func(), PHP_EOL;


echo ($obj->bar)(), PHP_EOL;
