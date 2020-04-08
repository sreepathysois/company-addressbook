<?php

class RouteHandler{

    private $routes;
    protected $baseName;

    public function add($method, $uri, $controller, $function){
        $this->routes[] = [
            'method'        => $method,
            'uri'           => $uri,
            'controller'    => $controller,
            'function'      => $function
        ];
    }

    public function parseUrl($url){
        $url = rtrim($url,'/');
        $url = explode('/', $url);

        return $url;
    }

    public function getBaseName(){
        return $this->baseName;
    }

    public function handle($request){
        $url = $this->parseUrl($request['url']);

        $router = ucFirst($url[0]).'Router.php';
        $routerClass = ucFirst($url[0]).'Router';

        if(file_exists('routing/'.$router)){
            require 'routing/'.$router;
            $entityRouter = new $routerClass();

            $this->route($entityRouter, $url, $_SERVER['REQUEST_METHOD']);
        }
        else{
            echo "it is $url[0]";
            throw new Exception('The file does not exist');
        }
    }

    public function route(RouteHandler $entityRouter, Array $url, $method){

        $route = $entityRouter->getRoute($entityRouter, $url[0], $method);
        $this->loadController($route, $_REQUEST);
    }

    public function getRoute(RouteHandler $entityRouter, $uri, $method){
        $routes = $entityRouter->getRoutes();

        foreach($routes as $route){
            if($route['uri']==$uri && $route['method']==$method){
                return $route;
            }
        }
    }

    public function getRoutes(){
        return $this->routes;
    }

    private function loadController(Array $route, $request){
        $controllerFile = $route['controller'].'.php';
        $controllerClass = $route['controller'];
        $function = $route['function'];
        
        if(file_exists('controllers/'.$controllerFile)){
            require 'controllers/'.$controllerFile;
            $controllerClass::{$function}($request);
        }
        else{
            echo "it is $url[0]";
            throw new Exception('The file does not exist');
        }

        return $controller;
    }
}
?>