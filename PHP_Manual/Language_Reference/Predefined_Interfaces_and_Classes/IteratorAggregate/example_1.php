<?php
class myData implements IteratorAggregate
{
    public $property1 = 'Public property one';
    public $property2 = 'Public property two';
    public $property3 = 'Public property three';

    public function __construct(){
	$this->property4 = 'Public property four';
	$this->property5 = 'Public property five';
    }

    public function getIterator(){
    	return new ArrayIterator($this);
    }
}

$obj = new myDAta;

foreach($obj as $key => $value){
    var_dump($key, $value);
    echo PHP_EOL;
}
