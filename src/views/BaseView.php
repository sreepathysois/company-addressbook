<?php
class BaseView{

    public function render($name){
        require 'views/' .$name. '.php';
    }
}
