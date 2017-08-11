<?php
class myclass{
    static function say_hello(){
        echo "Hello!\n";
    }
}

$class = "myclass";

call_user_func([$class, 'say_hello']);
call_user_func($class . '::say_hello');

$object = new myclass();

call_user_func([$object, 'say_hello']);
