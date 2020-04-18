<?php
class CompanyModel extends BaseModel{
    protected $table = 'organisations';
    protected $columns = [
        'name',
        'email'
    ];

    function __construct()
    {
        parent::__construct();  
    }
}

?>