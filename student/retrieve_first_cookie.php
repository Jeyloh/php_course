<?php
if(isset($_COOKIE['lastVisit']))
{
	$visit = $_COOKIE['lastVisit'];
} else {
	echo "You've got some stale cookies!";
}
if (isset($visit)){ // isset() is used to check if the variable has any value
	echo "Your last visit was - ". $visit;
}
?>