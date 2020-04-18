<?php
require 'BaseController.php';
include_once 'models/PeopleModel.php';
include_once 'models/CompanyModel.php';

class PeopleController extends BaseController{

    public function view(PeopleModel $model, $request){
        $people = $model->getAll();
        $companiesModel = new CompanyModel();
        $companies = $companiesModel->getAll();

        $this->view->render('PeopleView', ['people' => $people, 'companies' => $companies]);
    }

    public function show(PeopleModel $model=null, $request){
        echo $model->data;
    }

    public function delete(PeopleModel $model, $request){
        $model->delete();
        echo 'reached';
        //header('location:people');
    }
}
