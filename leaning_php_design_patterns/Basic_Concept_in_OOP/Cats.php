<?php
if(!class_exists('FurryPets')){
	include('FurryPets.php');
}

class Cats extends FurryPets{
	function __construct(){
		echo "Cats" . $this->fourlegs() . PHP_EOL;
		echo $this->makesSound("Meow, Meow") .PHP_EOL;
		echo $this->ownsHouse() . PHP_EOL;
	}

	private function ownsHouse(){
		return "I'll just walk on this keyboard." . PHP_EOL;
	}
}