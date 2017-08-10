<?php
class A{}

$o = new A();
$id = spl_object_hash($o);
var_dump($id);
