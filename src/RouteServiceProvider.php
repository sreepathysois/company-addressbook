<?php
require_once 'routing/Router.php';

class RouteServiceProvider{

    function __construct()
    {
        $request = $this->handleIndex($_REQUEST);

        $routeHandler = new Router();
        $routeHandler->loadRouteHandler($request);
    }

    private function handleIndex($request){
        if(!isSet($request['url'])){
            $request['url'] = 'index';
        }

        return $request;
    }
    
}
