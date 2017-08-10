<?php
class MyClass
{
	protected function myFunc(){
		echo "MyClass::myFunc()\n";
	}
}

class OtherClass extends MyClass
{
	public function myFunc(){
		parent::myFunc();
		echo "OtherClass::myFunc()\n";
	}
}

$class = new OtherClass();
$class->myFunc();
