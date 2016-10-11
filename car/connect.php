<?php
// Connect to the correct DB, throw error message if failed
$db='carsales';
$con= mysqli_connect('localhost', 'root', 'usbw', $db);
if (mysqli_connect_errno()) {
	trigger_error('Database connection failed: ' . mysqli_connect_error(), E_USER_ERROR);
}
?>