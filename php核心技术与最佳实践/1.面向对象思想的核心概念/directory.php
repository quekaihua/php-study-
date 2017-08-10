<?php
var_dump(__FILE__);
var_dump(dirname(__FILE__));
$dir = new DirectoryIterator(dirname(__FILE__));
foreach ($dir as $fileinfo){
	if(!$fileinfo->isDir()){
		echo $fileinfo->getFilename(), "\t", $fileinfo->getSize(), PHP_EOL;
	}
}
