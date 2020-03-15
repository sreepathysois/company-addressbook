<?php
    class BaseView{
        
        // function __construct()
        // {
        //     echo 'view reached';
        // }

        public function render($name){
            require 'views/' .$name. '.php';
        }
    }
