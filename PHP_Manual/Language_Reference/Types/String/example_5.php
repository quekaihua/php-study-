<?php
function foo(){
	static $bar = <<<LABEL
Nothing in here...
LABEL;
}

class foo{
	const BAR = <<<FOOBAR
Constant example
FOOBAR;

	public $baz = <<<FOOBAR
Property example
FOOBAR;
}