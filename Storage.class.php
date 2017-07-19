<?php
class Storage{

	static protected $handler;

	static public function connect($type='File'){
		$class = $type;
		self::$handler = new $class();
		var_dump(self::$handler);
	}

	static public function __callStatic($method, $args){
		// var_dump($method);
		// var_dump(self::$handler);
		// var_dump(method_exists(self::$handler, $method));
		if(method_exists(self::$handler, $method)){
			return call_user_func_array(array(self::$handler,$method), $args);
		}
	}
}
CREATE TABLE think_cache (
       cachekey varchar(255) NOT NULL,
       expire int(11) NOT NULL,
       data blob,
       datacrc int(32),
       UNIQUE KEY `cachekey` (`cachekey`)
     );