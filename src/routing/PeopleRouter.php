<?php
require_once 'RouteHandler.php';

class PeopleRouter extends RouteHandler{

    function __construct(){
        $this->add('GET', 'people', 'PeopleController', 'view');
        $this->add('GET', 'people/{id}', 'PeopleController', 'editView');
        $this->add('POST', 'people', 'PeopleController', 'create');
        $this->add('PATCH', 'people/{id}', 'PeopleController', 'update');
        $this->add('DELETE', 'people/{id}', 'PeopleController', 'delete');
    }
}

?>