<?php
class PublicVis{
	private $password;

	private function openSesame($someData){
		$this->password = $someData;
		if($this->password == 'secret'){
			echo "You're in!" . PHP_EOL;
		}else{
			echo "Release the hounds!" . PHP_EOL;
		}
	}

	public function unlock($safe){
		$this->openSesame($safe);
	}
}

$worker = new PublicVis();
$worker->unlock('secret');
$worker->unlock('duh');