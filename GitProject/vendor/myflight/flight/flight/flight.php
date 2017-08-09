<?php
class Flight{
	public function __callStatic($name, $params){
		echo "call $name  ";
		var_dump($params);
	}
}