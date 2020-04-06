<?php

class RouteServiceProvider{

    function __construct()
    {
        $url = $this->parseUrl();
        
        if(empty($url[0])){
            $url[0]='index';
            $url[1]='view';
        }

        if(empty($url[1])){
            $url[1]='view';
        }
        
        $controller = $this->loadController($url);
        
        if(isSet($url[1])){
            $this->loadControllerFunction($url, $controller);
        } 
    }

    private function parseUrl(){
        $url = $_GET['url'];
        $url = rtrim($url,'/');
        $url = explode('/', $url);

        return $url;
    }

    private function loadController(Array $url){
        $route_breakdown['controller_file'] = ucFirst($url[0]).'Controller.php';
        $route_breakdown['controller_class'] = ucFirst($url[0]).'Controller';
        
        if(file_exists('controllers/'.$route_breakdown['controller_file'])){
            require 'controllers/'.$route_breakdown['controller_file'];
            $controller = new $route_breakdown['controller_class'];
        }
        else{
            echo "it is $url[0]";
            throw new Exception('The file does not exist');
        }

        return $controller;
    }

    private function loadControllerFunction(Array $url, $controller){
        $route_breakdown['controller_function'] = $url[1];
        $route_breakdown['argument'] = $url[2];
    
        $controller->{$route_breakdown['controller_function']}($route_breakdown['argument']);
    }
    
}
