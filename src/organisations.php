<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php
include('DatabaseConnection.php');
//SQL query is here
$sql   = "Select *
                  From organisations
                  ";
$query = $DB->prepare($sql);

if ($query->execute() === FALSE) {
    die('Error Running Query: ' . implode($query->errorInfo(), ' '));
}

$result = $query->fetchAll();

//Table generation starts below
?>

    <table>
    <tr>
    <th>ID</th><th>Name</th><th>E-mail</th><th colspan="2">Action</th>
    </tr>

<?php
foreach ($result as $row) {
    echo "<tr>";
    echo "<td>" . $row['ID'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . "<a href='mailto:" . $row['email'] . "'>" . $row['email'] . "</a>" . "</td>";
    echo "<td>" . "<a href='editorg.php?id=" . $row['id'] . "'>" . "Edit" . "</a>" . "</td>";
    echo "<td>" . "<a href='deleteorg.php?id=" . $row['id'] . "'>" . "Delete" . "</a>" . "</td>";
    echo "</tr>";
}
?>

</table>
<br><br>
<table
<tr>
   <th>Add new </th>
</tr>
<tr>
   <form method="POST" action="addorg.php">
      <td><label>Name:</label><input type="text" name="name" required></td>
</tr>
<tr>
<td><label>E-mail:</label><input type="text" name="email" required></td>
</tr>
<tr><td><input type="submit" name="add"></td></tr>
</form>    
</table>
<h3 style="text-align:center;color:red">Warning: deleting/editing an organisation will delete/edit all the people in that organisation</h3>