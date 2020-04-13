<?php
include_once 'models/BaseModel.php';

class RouteHandler{

    private $routes;

    public function add($method, $uri, $controller, $function){
        $this->routes[] = [
            'method'        => $method,
            'uri'           => $uri,
            'controller'    => $controller,
            'function'      => $function
        ];
    }

    public function loadRouteHandler($request){
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

        $route = $entityRouter->getRoute($entityRouter, $url, $method);
        $function = $route['function'];

        $model = $this->loadModel($url);
        $controller = $this->loadController($route, $model);
        
        $controller->{$function}($model, $_REQUEST);
    }

    public function getRoute(RouteHandler $entityRouter, $uri, $method){
        $routes = $entityRouter->getRoutes();
        
        $parameterisedUrl = $this->handleParameters($uri);

        foreach($routes as $route){
            if($route['uri']==$parameterisedUrl && $route['method']==$method){
                return $route;
            }
        }
    }

    private function loadController(Array $route){
        $controllerFile = $route['controller'].'.php';
        $controllerClass = $route['controller'];
        
        if(file_exists('controllers/'.$controllerFile)){
            require 'controllers/'.$controllerFile;

            return new $controllerClass;
            
        }
        else{
            echo "it is $url[0]";
            throw new Exception('The file does not exist');
        }
    }

    private function loadModel(Array $url){
        $id = $url[1];

        if(isSet($id)){
            $modelFile = ucFirst($url[0]).'Model.php';
            $modelClass = ucFirst($url[0]).'Model';

            if(file_exists('models/'.$modelFile)){
                require 'models/'.$modelFile;
    
                //$model = $modelClass::Find($id);
                $model = new $modelClass;
                $model->get();
            }
            else{
                echo "it is $url[0]";
                throw new Exception('The file does not exist');
            }
        }

        return $model;
    }

    private function handleParameters(Array $url){
        for($i=0; $i<count($url); $i++){
            if(is_numeric($url[$i])){
                $url[$i] = "{id}";
            }
        }

        return implode("/",$url);
    }

    public function parseUrl($url){
        $url = rtrim($url,'/');
        $url = explode('/', $url);

        return $url;
    }

    public function getRoutes(){
        return $this->routes;
    }
}
?>