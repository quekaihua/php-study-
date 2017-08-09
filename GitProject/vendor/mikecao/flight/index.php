<?php
require 'flight/Flight.php';

class Greeting{
	public function __construct(){
		$this->name = 'John Doe';
	}

	public function hello(){
		echo "hello, $this->name!";
	}
}
$greeting = new Greeting();

Flight::route('POST /', array($greeting, 'hello'));

Flight::start();
?>
