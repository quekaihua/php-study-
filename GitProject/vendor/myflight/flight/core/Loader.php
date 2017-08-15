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

    public static function autoload($enabled = true, $dirs = []){
        if($enabled){
            spl_autoload_register([__CLASS__, 'loadClass']);
        }else{
            spl_autoload_unregister([__CLASS__, 'loadClass']);
        }

        if(!empty($dirs)){
            self::addDirectory($dirs);
        }
    }

    public static function loadClass($class){
        $class_file = str_replace(array('\\', '_'), '/', $class) . '.php';
        foreach(self::$dirs as $dir){
                        //    DIRECTORY_SEPARATOR
                        // var_dump(defined('DIRECTORY_SEPARATOR '));
            $file = $dir . '/'. $class_file;
            if(is_file($file)){
                require $file;
                return;
            }
        }
    }

    public static function addDirectory($dir){
        if(is_array($dir) || is_object($dir)){
            foreach($dir as $value){
                self::addDirectory($value);
            }
        }else if(is_string($dir)){
            if(!in_array($dir, self::$dirs)){
                self::$dirs[] = $dir;
            }
        }
    }

    public function getInstance($name){
        return isset($this->instances[$name]) ? $this->instances[$name] : null;
    }

    public function newInstance($class, array $params = []){
        if(is_callable($class)){
            return call_user_func_array($class, $params);
        }
        switch(count($params)){
            case 0:
                return new $class();
            case 1:
                return new $class($params[0]);
            case 2:
                return new $class($params[0], $params[1]);
            case 3:
                return new $class($params[0], $params[1], $params[2]);
            case 4:
                return new $class($params[0], $params[1], $params[2], $params[3]);
            case 5:
                return new $class($params[0], $params[1], $params[2], $params[3], $params[4]);
            default:
                $refClass = new \ReflectionClass($class);
                return $refClass->newInstanceArgs($params);
        }
    }

    public function load($name, $shared = true){
        $obj = null;
        if(isset($this->classes[$name])){
            list($class, $params, $callback) = $this->classes[$name];
            
            $exists = isset($this->instances[$name]);

            if($shared){
                $obj = $exists ?
                    $this->getInstance($name) :
                    $this->newInstance($class, $params);
            }else{
                $obj = $this->newInstance($class, $params);
            }

            if($callback && (!$shared || !$exists)){
                $ref = array(&$obj);
                call_user_func_array($callback, $ref);
            }
        }
        return $obj;
    }

}