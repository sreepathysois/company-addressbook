<?php
include('conn.php');
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
$sql    = " Insert into people(name,phone,organisationid,organisation)
           Values (:n,:p,:o,(Select name from organisations where id=:o))";
$query  = $dbhandle->prepare($sql);
$query->execute($params);
header('location:people.php');
?>    