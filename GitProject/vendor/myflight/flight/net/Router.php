<?php

namespace flight\net;

class Router{
    protected $routes = [];

    protected $index = 0;

    public $case_sensitive = false;

    public function getRoutes()
    {
        return $this->routes;
    }

    public function clear()
    {
        $this->routes = [];
    }

    public function map($pattern, $callback, $pass_route = false)
    {
        $url = $pattern;
        $methods = ['*'];

        if(strpos($pattern, ' ') !== false){
            list($method, $url) = explode(' ', trim($pattern), 2);
            $methods = explode('|', $method);
        }

        $this->routes[] = new Route($url, $callback, $methods, $pass_route);
    }
    
    public function route(Request $request)
    {
        while($route = $this->current()){
            if($route !== false && $route->matchMethod($request->method) && $route->matchUrl($request->url, $this->case_sensitive)){
                return $route;
            }
            $this->next();
        }
    }

    public function current()
    {
        return isset($this->routes[$this->index]) ? $this->routes[$this->index] : false;
    }

    public function next()
    {
        $this->index++;
    }

    public function reset()
    {
        $this->index = 0;
    }
}