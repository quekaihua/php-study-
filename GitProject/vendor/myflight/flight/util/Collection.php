<?php
/**
 * Author: 1112
 * Date: 2017/8/14
 * Time: 10:31
 */
namespace flight\util;

class Collection implements \ArrayAccess, \Iterator, \Countable{

    private $data;

    public function __construct(array $data = array())
    {
        $this->data = $data;
    }

    public function __get($key)
    {
        return isset($this->data[$key]) ? $this->data[$key] : null;
    }

    public function __set($key, $value)
    {
        $this->data[$key] = $value;
    }

    public function __isset($key)
    {
        return isset($this->data[$key]);
    }

    public function __unset($key)
    {
        unset($this->data[$key]);
    }

    public function clear()
    {
        $this->data = [];
    }

    public function offsetGet($offset)
    {
        return isset($this->data[$offset]) ? $this->data[$offset] : null;
    }

    public function offsetSet($offset, $value)
    {
        if(is_null($offset)){
            $this->data[] = $value;
        }else{
            $this->data[$offset] = $value;
        }
    }

    public function offsetExists($offset)
    {
        return isset($this->data[$offset]);
    }

    public function offsetUnset($offset)
    {
        unset($this->data[$offset]);
    }

    public function rewind()
    {
        reset($this->data);
    }

    public function next()
    {
        return next($this->data);
    }

    public function current()
    {
        return current($this->data);
    }

    public function key()
    {
        return key($this->data);
    }

    public function valid()
    {
        $key = key($this->data);
        return ($key !== null && $key != false);
    }

    public function count()
    {
        return count($this->data);
    }

    public function keys()
    {
        return array_keys($this->data);
    }

    public function getData()
    {
        return $this->data;
    }

    public function setData($data)
    {
        $this->data = $data;
    }




}