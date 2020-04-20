<?php
require_once 'Router.php';

class IndexRouter extends Router{

    function __construct(){
        $this->add('GET', 'index', 'IndexController', 'view');
    }
}

?>