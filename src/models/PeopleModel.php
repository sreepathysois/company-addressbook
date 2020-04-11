<?php
class PeopleModel extends BaseModel{
    public $data;

    function __construct()
    {
        $this->data = 'testData';    
    }

    public function Find($id){
        echo 'found';
        echo $id;
    }
}

?>