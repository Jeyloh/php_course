<html><head><title>Student Insert Record</title></head>
<body>

<?php              // Start of section of php code


/* The next four php statements extract (and saves in local php variables) the data sent to this script by the form in the calling script.

Notice that the method in the sending form was GET and this means that $_GET must be used to extract the data. 

Notice the format $_GET[key]  -- The key must be named exactly as the text field was named in the sending form.

Notice that the local variables used to store the received data do not need to match. */

$studentNum=$_GET['studentNo'];
$fname =$_GET['firstname'];    
$surname=$_GET['lastname'];
$birthday=$_GET['birthday'];
$title=$_GET['title'];
$address1=$_GET['address1'];
$address2=$_GET['address2'];
$address3=$_GET['address3'];
$gender=$_GET['gender'];
$phone=$_GET['phone'];
$email=$_GET['email'];
$country=$_GET['country'];
$passw=$_GET['password'];
$conf_pass=$_GET['confirmpw'];

$db="Student";         // Our database name is stored in a php variable $db

/* Connect to the Database (whose name is stored in $db) on the localhost server.

Store the connection information in php variable $link

*/

/* Check to see if the password and confirmed password matched */

if($passw != $conf_pass){    // Passwords don't match
	print "Passwords Don't match!!!";
	print "Record NOT added";
}
else if(strlen($passw) <= 6){
	print "Passwords must be at least 6 characters!";
	print "Record not added!";
}
else{
    $encrypt_pass=md5($passw);   // Use php md5 function to encrypt the password. 
}

$link = mysqli_connect('localhost', 'root', 'usbw',$db);
if (mysqli_connect_errno()) {
	trigger_error('Database connection failed: '  . mysqli_connect_error(), E_USER_ERROR);
}

/* 

Using the mysqli_query function perform a SQL INSERT
Notice that the tablename matches the tablename we created in the Student database.
Notice that the fields that we wish to insert values follow the tablename enclosed in parenthesis and match the names of the fields that we created using phpmyadmin.
Notice that the data to be stored in the fields follows the SQL keyword VALUES. In our example the data is stored in local variables. 
*/


$result=mysqli_query($link,"INSERT INTO studentInfo (studentId, studentSurname, studentFirstName,studentDOB,title, address1, address2, address3, gender, phone, email, country, password) 

	VALUES ('$studentNum', '$fname', '$surname', '$birthday','$title', '$address1', '$address2', '$address3', '$gender', '$phone', '$email', '$country', '$encrypt_pass')") or die("Insert Error: ".mysqli_error($link));



mysqli_close($link);       // Close the connection to the mysql server
print "Record added";
?>


<form method="POST" action="student_insert_form.php">
	<input type="submit" value="Insert Another Student Record">
</form>
<br>

<form method="POST" action="index.php">
	<input type="submit" value="Back to Student Records System Menu">
</form>


</body>
</html>