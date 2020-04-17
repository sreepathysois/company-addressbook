<?php
include('database/DatabaseConnection.php');
$id     = $_GET['id'];
$name   = $_POST['name'];
$phone  = $_POST['phone'];
$org    = $_POST['org'];
//Parametarised query to prevent SQL injection    
$params = array(
    ":n" => $name,
    ":p" => $phone,
    ":o" => $org,
    ":i" => $id
);
$sql    = " Update people
           Set name=:n, phone=:p, organisation=(Select name from organisations name where id=:o)
           Where id=:i";
$query  = $DB->prepare($sql);
$query->execute($params);

if ($query->execute($params) === FALSE) {
    die('Error Running Query: ' . implode($query->errorInfo(), ' '));
}
header('location:people.php');
?>