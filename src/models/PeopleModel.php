<?php
class PeopleModel extends BaseModel{
    protected $table = 'people';
    protected $fields = []
    function __construct()
    {
        $this->data = 'testData';    
    }

    public function Find($id){
        echo $this->table;
    }
}

?>