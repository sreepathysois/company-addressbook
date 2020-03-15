<?php
require 'BaseController.php';

class PeopleController extends BaseController{

    function __construct()
    {   
        parent::__construct();
        echo 'inside people controller';
    }

    public function test($argument){
        echo $argument;
    }
}
