<!-- https://moodle.wit.ie/mod/book/view.php?id=1757781&chapterid=59802 -->

<html>
<head><title>Edit Cars</title>
	<style type="text/css">
		th, td {font-family: tahoma, arial, verdana; font-size: 10pt; font-weight: 500 }
	</style>
</head>
<body>
<?php

include_once(connect.php);

$carID = $_POST(['carID']);

// Connect to the correct DB, throw error message if failed
$result = mysqli_query($con, "SELECT * FROM usedcars" ) or die("SELECT Error: ".mysqli_error($con));

// Retrieve the number of rows in the database table
$num_rows = mysqli_num_rows($result);

$sql = "SELECT * FROM `usedcars` WHERE `id`='".$carID."'";
$match = mysqli_query($con, $sql) or die("Select Error" . mysql_error());

if(mysqli_num_rows($match) > 0){
	// There is a match with the ID and we will now display a form with all data
	$matchedCar = mysqli_fetch_row($match); // This is an array
  	$manufacturer= $matchedCar['manufacturer'];  // Get the second field of the record TODO: Change this from an associative array to index, such as 1, 2 and 3
    $model = $matchedCar['model'];  // Get the third field of the record
    $colour = $matchedCar['colour'];    // Get the fourth field of the record
?>
	<table align="center" cellpadding="5" cellspacing="0" border="2" width="400px">
		<tr align="center" valign="top">
			<td align="left" colspan="1" rowspan="1" bgcolor="39b900">
				<h2 font-family='tahoma'>Register a Car</h2>
				<form method="POST" action="TODOCHANGETHIS.php">
					<fieldset>
						<legend>Edit Car</legend>
						<label>Manufacturer</label><br>
						<input type="text" name="id" size="30" required value="<?php echo "$manufacturer"?>"<br>
						<label>Model</label><br>
						<input type="text" name="manufacturer" size="30" required value="<?php echo "$model"?>"<br>
						<label>Colour</label><br>
						<input type="text" name="manufacturer" size="30" required value="<?php echo "$colour"?>"<br>
					</fieldset>
				</form>
			</td>
		</tr>
	</table>
<?php
} else {
	// There is no Car with that ID
	echo 'There is no car with that ID, choose what to do'
?>
	<br>
	<form method="POST" action="display_reg_cars.php">
	<input type="submit" value="Display Cars">
	</form>
	<form method="POST" action="insertCars.php">
	<input type="submit" value="Register Car">
	</form>
<?php
}


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