<?php

include('connect.php');  // connect to the database  $con
// username and password sent from form (currently in login.php)

$myusername=$_POST['myusername'];
$mypassword=$_POST['mypassword'];

// To protect MySQL injection

$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);



// To see if the username and password entered match with the database

$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
$result = mysqli_query($con,$sql);

if(isset($result)){
	$count= mysqli_num_rows($result);
}

else{
	$count = 0;
}



// If result matched $myusername and $mypassword, table row must be 1 row

if($count==1){
// Register $myusername, $mypassword and redirect to file "login_success.php"
	session_register("myusername");
session_register("mypassword");  // You would probably not save the password as a session variable.
$_SESSION["myusername"] = $myusername;
$_SESSION["mypassword"] = $mypassword;
header("location:login_success.php");   // Re-direct to the Login_success script
}

else {
	echo "Wrong Username or Password";
    header("location:login.php");   // Re-direct to the Login form script
}

?>