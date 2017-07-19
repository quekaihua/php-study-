<?php

include './Storage.class.php';

class File extends Storage{

	private $contents = array();

	public function __construct(){

	}

	public function read(){

	}

	public function get($filename){
		if(!$this->has($filename)){
			throw new Exception("there is no such file.", 1);
		}
		return file_get_contents($filename);
	}

	public function has($filename){
		return is_file($filename);
	}

	public function put($filename,$contents){
		// if(!$this->has($filename)){
		// 	touch($filename);
		// }
		$dir = dirname($filename);
		if(!is_dir($dir)){
			mkdir($dir, 0777, true);
		}
		if(false === file_put_contents($filename, $contents)){
			throw new Exception("file write error", 1);
		}else{
			return true;
		}
	}

	public function append($filename, $contents){
		// if(!$this->has($filename)){
		// 	touch($filename);
		// }
		$contents .= $this->get($filename);	
		$this->put($filename, $contents);
	}

	public function unlink($filename){
		if(!$this->has($filename)){
			throw new Exception("there is no such file.", 1);
		}
		return unlink($filename);
	}


}