<?php
require_once 'vendor/autoload.php';
require_once __DIR__ . '/classes/Hello.php';
require_once '../core/Dispatcher.php';
use PHPUnit\Framework\TestCase;
use \flight\core\Dispatcher;

class DispatcherTest extends TestCase{
    private $dispatcher;

    function setUp(){
        $this->dispatcher = new Dispatcher();
    }

    function testClosureMapping(){
        $this->dispatcher->set('map1', function(){
            return 'helloi';
        });
        $result = $this->dispatcher->run('map1');
        $this->assertEquals('hello', $result);
    }
}