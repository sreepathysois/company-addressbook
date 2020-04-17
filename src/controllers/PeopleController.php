<?php
require 'BaseController.php';
include_once 'models/PeopleModel.php';

class PeopleController extends BaseController{

    public function index(PeopleModel $model, $request){
        $people = $model->getAll();
        print_r($people);
    }

    public function show(PeopleModel $model=null, $request){
        echo $model->data;
    }
}
