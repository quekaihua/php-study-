<?php
require_once __DIR__ . '/classes/Hello.php';
require_once '../core/Dispatcher.php';
use PHPUnit\Framework\TestCase;
use \flight\core\Dispatcher;
$dispatcher = new Dispatcher();
$dispatcher->set('map1', function(){
    return "hello";
});
$dispatcher->run('map1');
