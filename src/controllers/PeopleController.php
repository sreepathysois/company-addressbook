<?php
require 'BaseController.php';
include_once 'models/PeopleModel.php';

class PeopleController extends BaseController{

    public function index(PeopleModel $model=null, $request){
        echo 'reached people index';
        //echo $model;
        //print_r($request);
    }

    public function show(PeopleModel $model=null, $request){
        echo $model->data;
    }
}
