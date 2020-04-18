<link rel="stylesheet" type="text/css" href="style.css">

<table>
<tr>
<th>ID</th><th>Name</th><th>Phone</th><th>Organisation</th><th colspan="2">Action</th>
</tr>

<?php
foreach ($people as $row) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['phone'] . "</td>";
    echo "<td>" . $row['organisation'] . "</td>";
    echo "<td>" . "<a href='editpeople.php?id=" . $row['id'] . "'>" . "Edit" . "</a>" . "</td>";
    echo "<td>" . "<form action='people/".$row['id']."' method='POST'>
                  <button type='submit' formmethod='POST' formaction='people/".$row['id']."'"."Submit</button>
                  <input type='submit' value='Delete' />
                  </form>" . "</td>";
    echo "</tr>";
}
?>

</table>
<br><br>
<table>
   <tr>
      <th>Add new </th>
   </tr>
   <tr>
      <form method="GET" action="/people/test/test">
         <td><label>Name:</label><input type="text" name="name" required></td>
   </tr>
   <tr>
   <td><label>Phone:</label><input type="text" name="phone" required></td>
   </tr>
   <tr>
   <td><label>Organisation:
   <Select name="org">
   <?php
      foreach ($companies as $row) {
      echo "<option value='" . $row['ID'] . "'>" . $row['name'];
	  }
      ?>
   </Select></td>
   </tr>
   <tr><td><input type="submit" name="add"></td></tr>
   </form>    
</table>