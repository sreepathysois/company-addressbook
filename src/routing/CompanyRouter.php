<?php
require_once 'RouteHandler.php';

class CompanyRouter extends RouteHandler{

    function __construct(){
        $this->add('GET', 'company', 'CompanyController', 'index');
    }
}

?>