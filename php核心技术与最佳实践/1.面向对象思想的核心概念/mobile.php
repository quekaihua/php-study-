<?php
class car{
	public function addoil(){
		echo "Add oil\r\n";
	}
}

class bmw extends car{}

class benz{
	public $car;
	public function __construct(){
		$this->car = new car();
	}

	public function addoil(){
		$this->car->addoil();
	}
}

$bmw = new bmw();
$bmw->addoil();
$benz = new benz();
$benz->addoil();
