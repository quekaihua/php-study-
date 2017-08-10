<?php
class Db_Adapter_Mysql implements Db_Adapter{
    private $_dbLink;
    public function connect($config){
        if($this->_dbLink = @mysql_connect($config->host, $config->user, $config->password, true)){
            if($config->charset){
                mysql_query("SET NAMES '{$config->charset}'", $this->_dbLink);
            }
            return $this->_dbLink；
        }
        throw new Db_Exception(@mysql_error($this->_dbLink));
    }
    public function query($query, $handle){
        if($resource = @mysql_query($query, $handle)){
            return $resource;
        }
    }
}