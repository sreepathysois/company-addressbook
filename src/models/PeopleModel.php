<?php
class PeopleModel extends BaseModel{
    protected $table = 'people';
    protected $columns = [
        'name',
        'phone',
        'organisation',
        'organisation_id'
    ];

    function __construct()
    {
        parent::__construct();  
    }

    public function Find($id){
        echo $this->table;
    }
}

?>