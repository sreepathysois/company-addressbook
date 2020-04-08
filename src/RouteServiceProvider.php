<?php
require_once 'routing/RouteHandler.php';

class RouteServiceProvider{

    function __construct()
    {
        $url = $this->parseUrl();
        $routeHandler = new RouteHandler();
        $routeHandler->handle($_REQUEST);
        // if(empty($url[0])){
        //     $url[0]='index';
        //     $url[1]='view';
        // }

        // if(empty($url[1])){
        //     $url[1]='view';
        // }
        // if($_SERVER['REQUEST_METHOD'] === 'GET') {
        //     echo 'gettest';
        //     print_r($_REQUEST);
        // }
        // $controller = $this->loadController($url);
        
        // if(isSet($url[1])){
        //     $this->loadControllerFunction($url, $controller);
        // } 
    }

    private function parseUrl(){
        $url = $_GET['url'];
        $url = rtrim($url,'/');
        $url = explode('/', $url);

        return $url;
    }

    
    
}
