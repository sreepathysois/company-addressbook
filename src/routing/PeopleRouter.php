<?php
require_once 'Router.php';

class PeopleRouter extends Router{

    function __construct(){
        $this->add('GET', 'people', 'PeopleController', 'view');
        $this->add('GET', 'people/{id}', 'PeopleController', 'editView');
        $this->add('POST', 'people', 'PeopleController', 'create');
        $this->add('PATCH', 'people/{id}', 'PeopleController', 'update');
        $this->add('DELETE', 'people/{id}', 'PeopleController', 'delete');
    }
}

?>