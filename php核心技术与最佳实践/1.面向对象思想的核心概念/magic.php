<?php
class Account{
	private $user = 1;
	private $pwd = 2;
	public function __set($name, $value){
		echo "Setting $name to $value \r\n";
		$this->$name = $value;
	}
	public function __get($name){
		if(!isset($this->$name)){
			echo "hasn't set the value.";
			$this->$name = 'default';
		}
		return $this->$name;
	}
}
$a = new Account();
echo $a->user;
$a->name = 5;
echo $a->name;
echo $a->big;
