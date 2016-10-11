<?php

// Define variables for username, pw and first name for later use.
$username = $POST_GET['username'];
$password = $POST_GET['password'];
$user_firstname = mysqli_query($link, "SELECT firstname FROM studentInfo") or die("SELECT Error: ".mysqli_error($link));

// Encrypt the password before adding it to DB
$encrypted_pw = md5($password);
// Connect to the DB.
$db="Student";
$link = mysqli_connect('localhost', 'root', 'usbw', $db);
if (mysqli_connect_errno()) {
	trigger_error('Database connection failed: '  . mysqli_connect_error(), E_USER_ERROR);
}

//TODO: When MYSQL access is achieved, check for the variable and table names in DB:
$test_pw = mysqli_query($link, "SELECT * FROM studentInfo WHERE studentId=$studentId AND password=$encrypted_pw") or die("SELECT Error: ".mysqli_error($link));
// Get an INT value, 1 or 0 to see if theres a user matching the pw 
$num_rows = mysqli_num_rows($test_pw);



if($num_rows == 1) {
	echo "Welcome " . $user_firstname;
	// QUESTION: mysqli_get_assoc($user_firstname);
} else {
	// No match with user/PW, redirect to the login page.
	header("Location: http://localhost:8080/student/check_login.php");
	die();
}

?>