<?php
class Account{
	public $user = 1;
	private $pwd = 2;
	public function __TOSTRINg(){
		return "now the obj's user is $this->user, pwd is $this->pwd";
	}
}
$a = new Account();
echo $a, PHP_EOL;
print_r($a);
