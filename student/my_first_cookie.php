<?php

/* 	Creating cookies requires you to use the setcookie(name, value, expiration) function
	name = the name of your cookie, and will be used to retrieve your cookie
	value = the stored value in your cookie, commonly used values are usernames, visit dates etc.
	expiration = the date when the cookie will expire and be deleted. If null, it's treated as a session and deleted on browser restart. */

//Calculate 60 days in the future
//seconds * minutes * hours * days + current time
$inTwoMonths = 60 * 60 * 24 * 60 + time();
setcookie('lastVisit', date("G:i - m/d/y"), $inTwoMonths); 
?>