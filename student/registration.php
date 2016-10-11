<?php



//----------function to check and clean data (usually from form) against security treats ----

//----------we need to pass a connection to mysql database as well as the string to be cleaned ---

function protect($con, $string){

    $string = mysqli_real_escape_string($con, $string);

    $string = strip_tags($string);

    $string = addslashes($string);

    return $string;

}



//----------connection to database. Probably should put this in a separate file to be included

//----------by any script using the database

$con = mysqli_connect('localhost', 'root', '','student') OR die("Error: ".mysql_error());





//----------if this is the first time calling the script then display the form with all fields blank



if(!isset($_POST['submit'])){

// action references this script --- $_server['php_self']

echo "<form action='".$_SERVER['PHP_SELF']."' method='post'>";

echo <<< _END

    <table border="0" cellspacing="3" cellpadding="3" align="center">\n

    <tr><td colspan="2" align="center" bgcolor="#333333"><font color="#ffffff">Registration Form</font></td></tr>\n

    <tr><td>Username</td><td><input type="text" name="username"></td></tr>\n

    <tr><td>Password</td><td><input type="password" name="password"></td></tr>\n

    <tr><td>Confirm</td><td><input type="password" name="passconf"></td></tr>\n

    <tr><td>E-Mail</td><td><input type="text" name="email"></td></tr>\n

    <tr><td align="left"><input type="submit" name="submit" value="Register"></form></td><form action='login.php' method='POST'><td align="right"><input type="submit" value="Login"></td></tr>\n

    </form></table>\n

_END;





//----------if this is NOT the first time calling the script then extract the POSTED data and check mandatory fields etc.



}else {

    $username = protect($con, $_POST['username']);

    $password = protect($con, $_POST['password']);

    $confirm = protect($con, $_POST['passconf']);

    $email = protect($con, $_POST['email']);

    $errors = array();    //define variable $errors as an array

//-----check mandatory fields



        if(!$username){

            $errors[] = "Username is not defined!";    //this adds a string to the array $errors

        }

        if(!$password){

            $errors[] = "Password is not defined!";

}

        if($password){

            if(!$confirm){

                $errors[] = "Confirmation password is not defined!";

            }

        }

        if(!$email){

            $errors[] = "E-mail is not defined!";

        }

        if($username){//---check that username is comprised of alphabetic or numeric characters only

            if(!ctype_alnum($username)){

                $errors[] = "Username can only contain numbers and letters!";

            }

$range = range(8,32);

            if(!in_array(strlen($username),$range)){

                $errors[] = "Username must be between 8 and 32 characters!";

            }

        }



//----- check that password and confirmPassword match

        if($password && $confirm){

            if($password != $confirm){

                $errors[] = "Passwords do not match!";

            }

        }

//----- check that email address is the correct format 

       if($email){

            $checkemail = "/^[a-z0-9]+([_\\.-][a-z0-9]+)*@([a-z0-9]+([\.-][a-z0-9]+)*)+\\.[a-z]{2,}$/i";

            if(!preg_match($checkemail, $email)){

                $errors[] = "E-mail is not valid, must be name@server.tld!";

            }

        }



//---- check that username has not been used already (ie. that it's not already in the table)

        if($username){

            $sql = "SELECT * FROM `users` WHERE `username`='".$username."'";

            $res = mysqli_query($con,$sql) or die(mysql_error());

            if(mysqli_num_rows($res) > 0){

                $errors[] = "The username you supplied is already in use!";

}

        }



//---- check that email address has not been used already

        if($email){

            $sql2 = "SELECT * FROM `users` WHERE `email`='".$email."'";

            $res2 = mysqli_query($con,$sql2) or die(mysql_error());



            if(mysqli_num_rows($res2) > 0){

                $errors[] = "The e-mail address you supplied is already in use of another user!";

            }

        }

//----------------------------------End of checks ----------------------------------------

//----------------------------------If errors found display each one ---------------------



        if(count($errors) > 0){

            foreach($errors AS $error){

                echo $error . "<br>\n";

            }



// after displaying errors you redisplay the form

echo "<form action='".$_SERVER['PHP_SELF']."' method='post'>";

echo <<< _END



<table border="0" cellspacing="3" cellpadding="3" align="center">\n

 

<tr><td colspan="2" align="center" bgcolor="#333333"><font color="#ffffff">Registration Form</font></td></tr>\n

<tr><td>Username</td><td><input type="text" name="username" value=$username></td></tr>\n

<tr><td>Password</td><td><input type="password" name="password"></td></tr>\n

<tr><td>Confirm</td><td><input type="password" name="passconf"></td></tr>\n

<tr><td>E-Mail</td><td><input type="text" name="email" value=$email></td></tr>\n

<tr><td align="left"><input type="submit" name="submit" value="Register"></form></td><form action='login.php' method='POST'><td align="right"><input type="submit" value="Login"></td></tr>\n

</form></table>\n

_END;



        }else {     // no errors !! - insert new record into the users table. (must have a users table in student database)



            $sql4 = "INSERT INTO `users`

                    (`username`,`password`,`email`)

                    VALUES ('".$username."','".$password."','".$email."')";

            $res4 = mysqli_query($con,$sql4) or die(mysql_error());

            echo "<font align=\"center\"><br><br>You have successfully registered with the username <b>".$username."</b> and the password <b>".$password."</b>!</font>";

        }

}

?>