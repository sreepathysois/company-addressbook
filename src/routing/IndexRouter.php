<?php
require_once 'RouteHandler.php';

class IndexRouter extends RouteHandler{

    function __construct(){
        $this->add('GET', 'index', 'IndexController', 'view');
    }
}

?>