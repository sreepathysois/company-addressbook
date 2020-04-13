<?php
include_once "DatabaseConnection.php";

class BaseModel{
    protected $table = null;
    protected $data = null;
    
    public function get(){
        echo $this->table;
    }
}