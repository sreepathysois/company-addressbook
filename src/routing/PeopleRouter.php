<?php
require_once 'RouteHandler.php';

class PeopleRouter extends RouteHandler{

    function __construct(){
        $this->add('GET', 'people', 'PeopleController', 'index');
        $this->add('GET', 'people/{id}', 'PeopleController', 'show');
        $this->add('POST', 'people', 'PeopleController', 'create');
        $this->add('PATCH', 'people', 'PeopleController', 'update');
        $this->add('DELETE', 'people', 'PeopleController', 'delete');
    }
}

?>