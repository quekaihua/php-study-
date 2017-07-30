<?php
abstract class IAbstract{
	protected $valueNow;

	abstract protected function giveCost();
	abstract protected function giveCity();

	public function displayShow(){
		$stringCost = $this->giveCost();
		$stringCity = $this->giveCity();
		$allTogether = "Cost: $stringCost for $stringCity";
		return $allTogether;
	}
}