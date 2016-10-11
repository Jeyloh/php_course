<?php
// session_start() is the function used to start a session. This allows you to assign a UserID and save user information to this UID for one current session.

// Sessions expire after invoking the destroy
session_start();
$_SESSION['views'] = 1; // This Super Global Variable Associate Array is used to create the session 'views' and set it to the default value of 1.
echo "Pageviews = ". $_SESSION['views']; //retrieve data
?>