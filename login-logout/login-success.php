<html>
<head>
	<title>Login</title>
</head>
<body>
	<?php
session_start(); // This must be at the start of scripts using the session variables.
//check that the session variable has been set. If not go to the login script.
if(!isset($_SESSION['myusername'])){ 
	header("location:login.php");
}
?>

<body>
	Login Successful  
</body>
</html>

