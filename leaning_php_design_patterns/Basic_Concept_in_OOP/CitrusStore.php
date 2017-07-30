<?php
include_once('IProduct.php');

class CitrusStore implements IProduct{

	public function apples(){
		return "CitrusStore sez--We do not sell apples." . PHP_EOL;
	}

	public function oranges(){
		return "CitrusStore sez--We have citrus fruit." . PHP_EOL;
	}
}