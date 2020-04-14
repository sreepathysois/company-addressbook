<?php
include_once "DatabaseConnection.php";

class BaseModel{
    protected $table = null;
    protected $columns = null;
    protected $db = null;

    function __construct()
    {
        $this->db = new PDO("mysql:host=db;dbname=database", "user", "password");
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }

    public function create(Array $values){
        $i = 0;
        foreach($this->columns as $field){
            $this->$field = $values[$i];
            $i++;
        }
        $this->save($values);
    }

    public function save(Array $values){
         $columns = $this->commaSeparate($this->columns, "`");
         $finalValues = $this->commaSeparate($values, "'");
         $table = $this->commaSeparate($this->table, "`");

        $query = "INSERT INTO $table ($columns) VALUES ($finalValues)";
        $this->db->query($query);
    } 

    public function get($id){
        $table = $this->commaSeparate($this->table, "`");
        $query = "Select * From $table Where id = $id";
        $result = $this->db->query($query)->fetchAll();
        
        return $result;        
    }

    public function update(){
        
    }

    public function delete(){

    }

    private function commaSeparate($input, $delimeter){
        $output = "";

        if(is_array($input)){
            $output = implode("$delimeter,$delimeter",$input);
            $output = "$delimeter".$output."$delimeter";
        }
        else{
            $output = "$delimeter".$input."$delimeter";
        }

        return $output;
    }
}