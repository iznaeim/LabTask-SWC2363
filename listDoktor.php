<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="includes.css" />
</head>

<body>

<?php include ("header.php");?>


<?php
//make the query
$q ="SELECT ID, FirstName, LastName, Specialization, Password FROM Doktor ORDER BY ID";

//run the query
$result =@mysqli_query ($connect, $q);

//it it ran without a problem, display the records
if($result)
{
	//Table heading
	echo '<table border="2">
	<tr><td><b>Edit</b></td>
	<td><b>Delete</b></td>
	<td><b>ID</b></td>
	<td><b>First Name</b></td>
	<td><b>Last Name</b></td>
	<td><b>Specialization</b></td>
	<td><b>Password</b></td></tr>';


	//Fetch the print all the records
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		echo '<tr>
		<td><a href = "edit_doktor.php?id='.$row['ID'].'">Edit</a></td>
		<td><a href = "delete_doktor.php?id='.$row['ID'].'">Delete</a></td>
		<td>' .$row ['ID']. '</td>
		<td>' .$row['FirstName']. '</td>
		<td>' . $row ['LastName']. '</td>
		<td>' . $row ['Specialization']. '</td>
		<td>' . $row ['Password']. '</td>
		</tr>';
	}
	//close the table
	echo '</table>';

	//free up the resources
	mysqli_free_result ($result);

//if failed to run
} else {

	//error message
	echo '<p class ="error">The current student could not be retrieved. We apologize for any inconvenience.</p>';

	//debugging message
	echo '<p>' .mysqli_error($connect). '<br><br/>Query: '.$q.'</p>';
} //end of it ($result)
//close the database connection
mysqli_close($connect);
?>

</div>
</div>
</body>
</html>