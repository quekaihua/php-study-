<?php
include 'example_1.php';
class ExtendClass extends SimpleClass{

	function displayVar(){
		echo "Extending class", PHP_EOL;
		parent::displayVar();
	}
}

$extended = new ExtendClass();
$extended->displayVar();