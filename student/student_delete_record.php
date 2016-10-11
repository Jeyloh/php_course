html><head><title>Student delete Record</title></head>

<body>

	<?php

$studentId = $_GET['studentId'];       // Data sent to this script is extracted and stored in variable $studentId

$db="student";

$con=mysqli_connect("localhost", "root" , "usbw", "student");

// Check connection

if (mysqli_connect_errno())

{

	echo "Failed to connect to MySQL: " . mysqli_connect_error();

}



/* The following php code calls the mysqli_query function with an SQL DELETE FROM command

*/



mysqli_query($con,"DELETE FROM studentinfo WHERE studentId = '$studentId'");



mysqli_close($con);

print "Record Deleted";

?>

<form method="POST" action="student_delete_form.php">

	<input type="submit" value="delete Another Record">

</form>

<br>



<form method="POST" action="index.php">

	<input type="submit" value="Dbase Interface">

</form>



</body>

</html>

