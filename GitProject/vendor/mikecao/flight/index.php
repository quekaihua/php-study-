<?php
require 'flight/Flight.php';

<<<<<<< HEAD
Flight::route('/', function(){
    echo 'hello world!';
});
=======
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
>>>>>>> 4f25a165c271bf7b03c51f4a55094d2c7fdbd467

Flight::start();
?>
