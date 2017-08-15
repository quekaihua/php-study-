<?php
require_once 'vendor/autoload.php';
// require_once __DIR__ . '/../flight/autoload.php';
require_once '../autoload.php';

class Client
{
    private $router;

    private $request;

    private $dispatcher;

    public function __construct()
    {
        $this->router = new \flight\net\Router();
        $this->request = new \flight\net\Request();
        $this->dispatcher = new \flight\core\Dispatcher();
        $this->testDefaultRoute();
        $this->check();
    }

    public function ok(){
        echo 'OK';
    }

    public function check(){
        $dispatched = false;
        // var_dump($this->router->route($this->request));
        while($route = $this->router->route($this->request)){
            $params = array_values($route->params);
            var_dump($route);
            if($route->pass){
                $params[] = $route;
            }

            $continue = $this->dispatcher->execute(
                $route->callback,
                $params
            );
            $dispatched = true;
            if(!$continue) break;

            $this->router->next();

            $dispatched = false;
        }

        if(!$dispatched){
            echo '404';
        }
    }

    function testDefaultRoute(){
        $this->router->map('/', array($this, 'OK'));
        var_dump($this->request);
        $this->request->url = '/';
    }
}

$work = new Client();
