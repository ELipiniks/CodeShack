<?php

namespace Framework;

class Router
{
    protected $routes;

    public function get($url,$method)
    {
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            $this->routes[$url] = $method;
        }
    }

    public function post($url,$method)
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->routes[$url] = $method;
        }
    }

    public function dispatch()
    {
        $url = $_GET['url'] ?? null;

        foreach($this->routes as $route => $method){
            if($url == $route){
                return call_user_func($method);
            }
        }
    }
}
