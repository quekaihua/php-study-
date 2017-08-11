<?php
namespace flight\core;

class Loader{

    protected $classes = [];

    protected $instances = [];

    protected static $dirs = [];

    public function register($name, $class, array $params = [], $callback = null){
        unset($this->instances[$name]);
        $this->classes[$name] = array($class, $params, $callback);
    }

    public function unregister($name){
        unset($this->classes[$name]);
    }

    public function get($name){
        return isset($this->classes[$name]) ? $this->classes[$name] : null;
    }

    public function reset(){
        $this->classes = [];
        $this->instances = [];
    }

    public static function addDirectory($dir){
        if(is_array($dir) || is_object($dir)){
            foreach($dir as $value){
                self::addDirectory($value);
            }
        }else if(is_string($dir)){
            if(!is_array($dir, self::$dirs)){
                self::$dirs[] = $dir;
            }
        }

    }

}