<?php
include_once('FurryPets.php');

class Dogs extends FurryPets{
	function __construct(){
		echo "Dogs" . $this->fourlegs() . PHP_EOL;
		echo $this->makesSound("Woof, Woof") .PHP_EOL;
		echo $this->guardsHouse() . PHP_EOL;
	}

	private function guardsHouse(){
		return "Grrrrrr" . PHP_EOL;
	}
}