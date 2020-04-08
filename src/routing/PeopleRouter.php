<?php
require_once 'RouteHandler.php';

class PeopleRouter extends RouteHandler{
    protected $baseName = 'people';

    function __construct(){
        $this->add('GET', 'people', 'PeopleController', 'index');
        $this->add('GET', 'people/{id}', 'PeopleController', 'show');
    }
}

?>