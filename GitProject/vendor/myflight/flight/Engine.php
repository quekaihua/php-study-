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
            $this->loader->reset();
            $this->dispatcher->reset();
            $this->init();
        }

        $this->loader->register('request', '\flight\net\Request');
        $this->loader->register('response', '\flight\net\Response');
        $this->loader->register('router', '\flight\net\Router');
        $this->loader->register('view', '\flight\template\View', [], function($view) use($self){
            $view->path = $self->get('flight.views.path');
            $view->extension = $self->get('flight.views.extension');
        });

        $methods = [
            'start', 'stop', 'route', 'halt', 'error', 'notFound',
            'render', 'redirect', 'etag', 'lastModified', 'json', 'jsonp'
        ];

        foreach($methods as $name){
            $this->dispatcher->set($name, [$this, '_' . $name]);
        }

        $this->set('flight.base_url', null);
        $this->set('flight.case_sentitive', false);
        $this->set('flight.handle_errors', true);
        $this->set('flight.log_errors', false);
        $this->set('flight.views.path', './views');
        $this->set('flight.views.extension', '.php');

        $initialized = true;
    }

    public function __call($name, $params)
    {
        $callback = $this->dispatcher->get($name);

        if(is_callable($callback)){
            return $this->run($name, $params);
        }

        if(!$this->loader->get($name)){
            throw new \Exception("$name must be a mapped method.");
        }

        $shared = (!empty($params)) ? (bool) $params[0] : true;

        return $this->loader->load($name, $shared);
    }

    public function handleErrors($enabled)
    {
        if($enabled){
            set_error_handler([$this, 'handleError']);
            set_exception_handler([$this, 'handleException']);
        }else{
            restore_error_handler();
            restore_exception_handler();
        }
    }

    public function handleError($errno, $errstr, $errfile, $errline)
    {
        if($errno & err_reporting()){
            throw new \ErrorException($errstr, $errno, 0, $errfile, $errline);
        }
    }

    public function handleException($e)
    {
        if($this->get('flight.log_errors')){
            error_log($e->getMessage());
        }

        $this->error($e);
    }

    public function map($name, $callback)
    {
        if(method_exists($this, $name)){
            throw new \Exception('Cannot override an existing framework method.');
        }

        $this->dispatcher->set($name, $callback);
    }

    
    public function register($name, $class, array $params = [], $callback = null)
    {
        if(method_exists($this, $name)){
            throw new \Exception('Cannot override an existing framework method.');
        }

        $this->loader->register($name, $class, $params, $callback);
    }

    public function before($name, $callback)
    {
        $this->dispatcher->hook($name, 'before', $callback);
    }

    public function after($name, $callback)
    {
        $this->dispatcher->hook($name, 'after', $callback);
    }

    public function get($key = null)
    {
        if($key === null) return $this->vars;
        return isset($this->vars[$key]) ? $this->vars[$key] : null;
    }

    public function set($key, $value = null)
    {
        if(is_array($key) || is_object($key)){
            foreach($key as $k => $v){
                $this->vars[$k] = $v;
            }
        }else{
            $this->vars[$key] = $value;
        }
    }

    public function has($key)
    {
        return isset($this->vars[$key]);
    }

    public function clear($key = null)
    {
        if(is_null($key)){
            $this->vars[] = []; 
        }else{
            unset($this->vars[$key]);
        }
    }

    public function path($dir)
    {
        $this->loader->addDirectory($dir);
    }
  
    /*** Extensible Methods ***/

    public function _start()
    {
        $dispatched = false;
        $self = $this;
        $request = $this->request();
        $response = $this->response();
        $router = $this->router();

        if(ob_get_length() > 0){
            $response->write(ob_get_clean());
        }

        ob_start();

        $this->handleErrors($this->get('flight.handle_errors'));

        $this->after('start', function() use ($self){
            $self->stop();
        });

        $router->case_sensitive = $this->get('flight.case_sensitive');

        while($route = $route->route($request)){
            $params = array_values($route_params);

            if($route->pass){
                $params[] = $route;
            }

            $continue = $this->dispatcher->execute(
                $route->callback,
                $params
            );

            $dispatched = true;
            
            if(!$continue) break;

            $route->next();

            $dispatched = false;
        }

        if(!$dispatched){
            $this->notFound();
        }
    }

    public function _stop($code = 200){
        $this->response()
            ->status($code)
            ->write(ob_get_clean())
            ->send();
    }

}