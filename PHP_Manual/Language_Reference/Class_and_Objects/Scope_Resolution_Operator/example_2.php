<?php
include './example_1.php';
class OtherClass extends MyClass{
	public static $my_static = 'static var';
	public static function doubleColon(){
		echo parent::CONST_VALUE . '\n';
		echo self::$my_static . '\n';
    	}
}

$classname = 'OtherClass';
echo $classname::doubleColon();
OtherClass::doubleColon();
