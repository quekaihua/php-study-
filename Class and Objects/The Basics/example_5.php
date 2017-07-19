<?php
class Test{
	static public function getNew(){
		return new static;
	}
}

class Child extends Test{}

$obj1 = new Test();
$obj2 = new $obj1;  //新方法创建实例
var_dump($obj1 !== $obj2);

$obj3 = Test::getNew();  //新方法创建实例
var_dump($obj3 instanceof Test);

$obj4 = Child::getNew();
var_dump($obj4 instanceof Child);