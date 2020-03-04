<?php
include('conn.php');
$id  = $_GET['id'];
$sql = "Select *
        From organisations
        Where ID=$id";

$query = $dbhandle->prepare($sql);

if ($query->execute() === FALSE) {
    die('Error Running Query: ' . implode($query->errorInfo(), ' '));
}

$result = $query->fetchAll();
$name   = $email = '';
foreach ($result as $row) {
    $name  = $row['name'];
    $email = $row['email'];
}
?>
<html>
   <body>
      <h2>Edit Organisation</h2>
      <form method="POST" action="updateorg.php?id=<?php echo $id; ?>">
         <label>Name:</label><input type="text" value=<?php echo '"' . $name . '"'; ?> name="name" required>
         <label>E-mail:</label><input type="text" value=<?php echo '"' . $email . '"'; ?> name="email" required>
         <input type="submit" name="submit">
         <a href="organisations.php">Back</a>
      </form>
   </body>
</html>