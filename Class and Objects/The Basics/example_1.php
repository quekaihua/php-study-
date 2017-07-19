<?php
class SimpleClass{

	public $var = 'a default value';

	public function displayVar(){
		echo $this->var, PHP_EOL;
	}
}

// $class = new SimpleClass();
// $class->displayVar();