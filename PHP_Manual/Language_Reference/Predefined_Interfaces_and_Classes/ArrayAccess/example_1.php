<?php
/**
 * Author: 1112
 * Date: 2017/8/14
 * Time: 9:47
 */
class obj implements ArrayAccess{

    private $container = array();

    public function __construct()
    {
        $this->container = array(
            "one" => 1,
            "two" => 2,
            "three" => 3
        );
    }

    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    public function offsetGet($offset)
    {
        return $this->container[$offset];
    }

    public function offsetSet($offset, $value)
    {
        if(is_null($offset)){
            $this->container[] = $value;
        }else{
            $this->container[$offset] = $value;
        }
    }

    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }
}

$obj = new obj();
var_dump(isset($obj["two"]));
var_dump($obj{"two"});
unset($obj["two"]);
var_dump(isset($obj["two"]));
$obj["two"] = "A value";
var_dump($obj["two"]);
$obj[] = 'Append 1';
$obj[] = 'Append 2';
print_r($obj);