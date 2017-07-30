<?php
include_once("IMethodHolder.php");

class ImplementAlpha implements IMethodHolder{
	
	public function getInfo($info){
		echo "This is NEWS!" . $info . PHP_EOL;
	}

	public function sendInfo($info){
		return $info;
	}

	public function calculate($first, $second){
		$calculate = $first * $second;
		return $calculate;
	}

	public function useMethods(){
		$this->getInfo("The sky is falling...");
		echo $this->sendInfo("Vote for Senator Snort!") . PHP_EOL;
		echo "You make $" . $this->calculate(20, 15) . " in your part-time job" . PHP_EOL;
	}
}

$worker = new ImplementAlpha();
$worker->useMethods();