<?php
include('database/DatabaseConnection.php');
$id     = $_GET['id'];
$name   = $_POST['name'];
$email  = $_POST['email'];
//Parametarised query to prevent SQL injection    
$params = array(
    ":n" => $name,
    ":e" => $email,
    ":i" => $id
);
$sql    = " Update organisations
           Set name=:n, email=:e
           Where id=:i";
$query  = $DB->prepare($sql);
$query->execute($params);

if ($query->execute($params) === FALSE) {
    die('Error Running Query: ' . implode($query->errorInfo(), ' '));
}
header('location:organisations.php');
?>