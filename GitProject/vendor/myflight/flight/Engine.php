<?php
namespace flight;

use flight\core\loader;
use flight\core\Dispatcher;

class Engine{

    protected $vars;
    protected $loader;
    protected $dispatcher;

    public function __construct(){
        $this->vars = array();
        $this->loader = new Loader();
        $this->dispatcher = new Dispatcher();
        $this->init();
    }
}