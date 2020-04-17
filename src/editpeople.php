<?php
	include('database/DatabaseConnection.php');
	$id=$_GET['id'];
	$sql="Select *
        From people
        Where ID=$id";
	$sql2= "Select * From organisations";
	$query = $DB->prepare($sql);
	$query2= $DB->prepare($sql2);
	$query2->execute();
	$orglist= $query2->fetchAll();

if ( $query->execute() === FALSE ) {
        die('Error Running Query: ' . implode($query->errorInfo(),' '));
      }

$result = $query->fetchAll();
$name = $phone = $organisation = '';
foreach($result as $row){
	$name = $row['name'];
	$phone=$row['phone'];
	$organisation=$row['organisation'];
}
?>
<html>
<body>
	<h2>Edit</h2>
	<form method="POST" action="updatepeople.php?id=<?php echo $id; ?>">
		<label>Name:</label><input type="text" value=<?php echo '"'.$name.'"';?> name="name" required>
		<label>Phone:</label><input type="text" value=<?php echo '"'.$phone.'"'; ?> name="phone" required>
		<label>Organisation:</label>
			<Select name="org">
			<?php
			foreach($orglist as $row)
			{
			echo "<option value='" . $row['ID'] . "'>".$row['name'];
			}
			?>

			</Select>
		<input type="submit" name="submit">
		<a href="people.php">Back</a>
	</form>
</body>
</html>
