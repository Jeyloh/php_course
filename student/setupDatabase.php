<html><head><title>Setting up database</title></head><body>

<h3>Setting up...</h3>

<?php // Example 21-3: setup.php

function createTable($name, $query)
{
    $result = mysql_query("CREATE TABLE IF NOT EXISTS $name($query)");
    echo "Table '$name' created or already exists.<br />";
}


$con = mysql_connect("localhost","root","usbw");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }



if (mysql_query("CREATE DATABASE IF NOT EXISTS Student",$con))
  {
  echo "Database created";
  }
else
  {
  echo "Error creating database: " . mysql_error();
  }

mysql_select_db('Student', $con);


createTable('studentinfo',
            'studentNo VARCHAR(30) PRIMARY KEY,
            firstname VARCHAR(30),
            lastname VARCHAR(30),
            birthday VARCHAR(30),
            title VARCHAR(8),
            address1 VARCHAR(30),
            address2 VARCHAR(30),
            address3 VARCHAR(30),
            country VARCHAR(15),
            gender VARCHAR(6),
            phone VARCHAR(15),
            email VARCHAR(15),            
            password VARCHAR(30)');


mysql_query("INSERT INTO studentinfo (id,manufacturer,model,colour,year,type,doors,cc,fuel,email,phone)
            VALUES('W2007250463','Joergen','Hansen','181194', 'Mr', 'Suldalsveien', 'Kristiansand', 'Agder' ,'Norway', 'male', '004892783940,'jeorgen94@gmail/.com','encryptedpassword')");
?>

<br />...done.
</body></html>