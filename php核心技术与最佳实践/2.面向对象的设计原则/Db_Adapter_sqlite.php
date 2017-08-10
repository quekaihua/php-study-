<?php
class Db_Adapter_sqlite implements Db_Adapter{
    private $_dbLink;
    public function connect($config){
        if($this->_dbLink = sqlite_open($config->file, 0666, $error)){
            return $this->_dbLink;
        }
        throw new Db_Exception($error);
    }

    public function query($query, $handle){
        if($resource = @sqlite_query($query, $handle)){
            return $resource;
        }
    }
}