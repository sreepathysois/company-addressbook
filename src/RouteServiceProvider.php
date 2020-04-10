<?php
require_once 'routing/RouteHandler.php';

class RouteServiceProvider{

    function __construct()
    {
        $request = $this->handleRequest($_REQUEST);

        $routeHandler = new RouteHandler();
        $routeHandler->loadRouteHandler($request);
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

    private function handleRequest($request){
        if(!isSet($request['url'])){
            $request['url'] = 'index';
        }

        return $request;
    }

    
    
}
