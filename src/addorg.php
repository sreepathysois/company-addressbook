<?php
include('DatabseConnection.php');
$name   = $_POST['name'];
$email  = $_POST['email'];
//Parametarised query to prevent SQL injection    
$params = array(
    ":n" => $name,
    ":e" => $email
);
$sql    = " Insert into organisations(name,email)
           Values (:n,:e)";
$query  = $DB->prepare($sql);
$query->execute($params);
header('location:organisations.php');
?>    