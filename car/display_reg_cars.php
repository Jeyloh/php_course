<html>
<head><title>Display Records</title>
	<style type="text/css">
		th, td {font-family: tahoma, arial, verdana; font-size: 10pt; font-weight: 500 }
	</style>
</head>
<body>
	<?php
	// Connect to the correct DB, throw error message if failed
	require_once('connect.php');

	// Find data from the database, stored in rows
	$result = mysqli_query($con, "SELECT * FROM usedcars" ) or die("SELECT Error: ".mysqli_error($con));

	// Retrieve the number of rows in the database table
	$num_rows = mysqli_num_rows($result);

	print "There are $num_rows records. <br>";

	//Display the table
	print "<table width=600 border=1>";          
	print "<tr><th>ID</th><th>Manufacturer</th><th>Model</th><th>Colour</th>";
	print "<th>Year</th><th>Type</th><th>Doors</th>";
	print "<th>CC</th><th>Fuel</th><th>Email</th><th>Phone</th></tr>"; 

	while($get_info = mysqli_fetch_row($result)){
		print "<tr>";

		foreach ($get_info as $field) {
			print "<td>$field</td>";
		}

		print "<tr>";
	}
	print "</table>";
   	mysqli_close($con);
	?>
<br>
<form method="POST" action="display_reg_cars.php">
<input type="submit" value="Display Cars">
</form>
<form method="POST" action="insertCars.php">
<input type="submit" value="Register Car">
</form>



</body>
</html> 