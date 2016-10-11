<html>
<head><title>Display Records</title>
	<style type="text/css">
		th, td {font-family: tahoma, arial, verdana; font-size: 10pt; font-weight: 500 }
	</style>


</head>
<body>
	<?php
	/* Change next two lines if using online -- These lines store the database name in a php variable $db  and connect to the localhost mysql server/Student database using the php mysqli_connect function. */
	$db="Student";
	$link = mysqli_connect('localhost', 'root', 'usbw',$db);
	if (mysqli_connect_errno()) {
		trigger_error('Database connection failed: '  . mysqli_connect_error(), E_USER_ERROR);
	}

	/*  The following line uses the php mysqli_query function to read data from the studentInfo table  */


	$result = mysqli_query($link, "SELECT * FROM studinfowithoutpw" ) or die("SELECT Error: ".mysqli_error($link));



	/* The following line uses a mysqli function to get the number of records retrieved by the last query */


	$num_rows = mysqli_num_rows($result);

	print "There are $num_rows records.<br><br>";      

	/* Display a html table    */
	print "<table width=600 border=1>";          
	print "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Birth Date</th>";
	print "<th>Title</th><th>Gender</th><th>Address1</ th><th>Address2</th>";
	print "<th>Address3</th><th>Country</th><th>Email</th><th>Phone</th></tr>";

	/* Outer loop using mysqli fetch row function to extract a single record and store it in php variable $get_info  */
	while ($get_info = mysqli_fetch_row($result)){
		print "<tr>";

		/* Inner foreach loop  to extract a single field from $get_info and store it in php variable $field  */
		foreach ($get_info as $field) 
           print "<td>$field</td>";    //display the field as a table cell
       print "</tr>";
   }
   print "</table>";
   mysqli_close($link);
   ?>
   <br>

   <form method="POST" action="index.php">
   	<input type="submit" value="Dbase Interface">
   </form>

</body>
</html> 