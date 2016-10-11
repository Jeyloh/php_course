<html><head><title>Car Registration</title></head>
<body>

<?php


// Converts the ID to upper case
$cid=strtoupper($_GET['id']);
$manufacturer=$_GET['manufacturer'];    
$model=$_GET['model'];
$colour=$_GET['colour'];
$year=$_GET['year'];
$type=$_GET['type'];
$doors=$_GET['doors'];
$cc=$_GET['cc'];
$fuel=$_GET['fuel'];
$email=$_GET['email'];
$phone=$_GET['phone'];

// Declare errors array
$errors = array();

//connect to the database
require_once('connect.php');


// Check if either email or phone is filled in
if(!isset($email) || !isset($phone)) {
	$errors[] = "Define either email or phone";
}

// Checks if the username is alphabetic or numeric
if(preg_match('/[A-Z]+[a-z]+[0-9]+/', $uid)) {
	$errors[] = "Use alphabetic or numeric characters";
} 

// Checks if the car ID is already in the database
if($cid){
	$sql = "SELECT * FROM `usedcars` WHERE `id`='".$cid."'";
	$res = mysqli_query($con, $sql) or die("Select Error" . mysql_error());
	if(mysqli_num_rows($res) > 0){
		$errors[] = "This car is already registered";
	}
}

// If there are errors, display and recall the car insert form
if(count($errors) > 0) {
	echo "Ran into errors, the car was not registered: ";
	foreach ($errors as $errorMessage) {
    	echo "$errorMessage <br>";
	}
	// Recall car insert form
} 
else {
	echo "No errors found, the car is registered! ";
	// Used to insert all the variables from the form into the database!
	$result=mysqli_query($con,
	"	INSERT INTO usedcars (id, manufacturer, model, colour, year, type, doors, cc, fuel, email, phone) 
		VALUES ('$cid', '$manufacturer', '$model', '$colour','$year', '$type', '$doors', '$cc', '$fuel', '$email', '$phone)") 
		or die("Insert Error: ".mysqli_error($con));
	echo "Record added";
	mysqli_close($con);       // Close the connection to the mysql server
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