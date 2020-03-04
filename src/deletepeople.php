<?php
$id = $_GET['id'];
include('conn.php');
//Parametarised query to prevent SQL injection    
$params = array(
    ":i" => $id);
$sql    = "Delete
          From people 
          Where id=:i";

$query = $dbhandle->prepare($sql);
$query->execute($params);


if ($query->execute($params) === FALSE) {
    die('Error Running Query: ' . implode($query->errorInfo(), ' '));
}

header('location:people.php');
?>