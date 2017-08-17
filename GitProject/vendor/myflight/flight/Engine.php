<?php
namespace flight;

use flight\core\loader;
use flight\core\Dispatcher;

class Engine{

    protected $vars;
    protected $loader;
    protected $dispatcher;

    public function __construct()
    {
        $this->vars = [];
        $this->loader = new Loader();
        $this->dispatcher = new Dispatcher();
        $this->init();
    }

    public function init()
    {
        static $initialized = false;
        $self = $this;

        if($initialized){
            $this->vars = [];
            $this->loader = new Loader();
            $this->dispatcher = new Dispatcher();
            $this->init();
        }

        $this->loader->register('request', '\flight\net\Request');
        
    }
}