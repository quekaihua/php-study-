<?php
namespace flight\core;

class Dispathcher{
    protected $events = array();

    protected $filters = array();

    public function set($name, $callback){
        $this->events[$name] = $callback;
    }

    public function get($name){
        return isset($this->events[$name]) ? $this->events[$name] : null;
    }

    public function has($name){
        return isset($this->events[$name]);
    }

    public function clear($name = null){
        if($name !== null){
            unset($this->events[$name]);
            unset($this->filters[$name]);
        }else{
            $this->events = array();
            $this->filters = array();
        }
    }

    public function reset(){
        $this->events = array();
        $this->filters = array();
    }

    public function hook($name, $type, $callback){
        $this->filters[$name][$type][] = $callback;
    }

    public static function callFunction($func, array &$params = array()){
        if(is_string($func) && strpos($func, '::') !== false){
            return call_user_func_array($func, $params);
        }
        switch(count($params)){
            case 0:
                return $func();
            case 1:
                return $func($params[0]);
            case 2:
                return $func($params[0], $params[1]);
            case 3:
                return $func($params[0], $params[1], $params[2]);
            case 4:
                return $func($params[0], $params[1], $params[2], $params[3]);
            case 5:
                return $func($params[0], $params[1], $params[2], $params[3], $params[4]);
            default:
                return call_user_func_array($func, $params);
        }
    }

    public static function invokeMethod($func, array &$params = array()){
        list($class, $method) = $func;
        $instance = is_object($class);
        switch(count($params)){
            case 0:
                return ($instance) ?
                    $class->$method() :
                    $class::$method();
            case 1:
                return ($instance) ?
                    $class->$method($params[0]) :
                    $class::$method($params[0]);
            case 2:
                return ($instance) ?
                    $class->$method($params[0], $params[1]) :
                    $class::$method($params[0], $params[1]);
            case 3:
                return ($instance) ?
                    $class->$method($params[0], $params[1], $params[2]) :
                    $class::$method($params[0], $params[1], $params[2]);
            case 4:
                return ($instance) ?
                    $class->$method($params[0], $params[1], $params[2], $params[3]) :
                    $class::$method($params[0], $params[1], $params[2], $params[3]);
            case 5:
                return ($instance) ?
                    $class->$method($params[0], $params[1], $params[2], $params[3], $params[4]) :
                    $class::$method($params[0], $params[1], $params[2], $params[3], $params[4]);
            default:
                return call_user_func_array($func, $params);
        }
    }

    public static function execute($callback, array &$params = array()){
        if(is_callable($callback)){
            return is_array($callback) ?
                self::invokeMethod($callback, $params) :
                self::callFunction($callback, $params);
        }else{
            throw new \Exception('Invalid callback specified.');
        }
    }

    public function filter($filters, &$params, &$output){
        $args = array(&$params, &$output);
        foreach($filters as $callback){
            $continue = $this->execute($callback, $args);
            if($continue === false) break;
        }
    }

    public function run($name, array $params = array()){
        $output = '';

        if(!empty($this->filters[$name]['before'])){
            $this->filter($this->filter[$name]['before'], $params, $output);
        }

        $ouput = $this->execute($this->get($name), $params);

        if(!empty($this->filters[$name]['after'])){
            $this->filter($this->filter[$name]['after'], $params, $output);
        }

        return $ouput;
    }

}