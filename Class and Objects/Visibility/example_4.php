<?php
//同一个类的对象即使不是同一个实例也可以互相访问对方的私有与受保护成员。
class Test{
	private $foo;

	public function __construct($foo){
		$this->foo = $foo;
	}

	private function bar(){
		echo "Accessed the private method.\n";
	}

	public function baz(Test $other){
		$other->foo = 'hello';
		var_dump($other->foo);
		
		$other->bar();
	}
}

$test = new Test('test');
$test->baz(new Test('other'));