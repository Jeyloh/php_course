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



if (mysql_query("CREATE DATABASE IF NOT EXISTS CarSales",$con))
  {
  echo "Database created";
  }
else
  {
  echo "Error creating database: " . mysql_error();
  }

mysql_select_db('CarSales', $con);


createTable('UsedCars',
            'id VARCHAR(10) PRIMARY KEY,
            manufacturer VARCHAR(16),
            model VARCHAR(16),
            colour VARCHAR(15),
            year INT UNSIGNED,
            type VARCHAR(10),
            doors INT UNSIGNED,
            cc INT UNSIGNED,
            fuel VARCHAR(10),
            email VARCHAR(30),
            phone VARCHAR(15)');
mysql_query("INSERT INTO Persons (FirstName, LastName, Age)
VALUES ('Peter', 'Griffin', 35)");


mysql_query("INSERT INTO UsedCars (id, manufacturer, model, colour, year, type, doors, cc, fuel, email, phone)
            VALUES('10W1234','Toyota','Avensis','Yellow',2010,'Estate',5,2000,'Petrol','jdaly@wit.ie','0837654321')");

mysql_query("INSERT INTO UsedCars (id,manufacturer,model,colour,year,type,doors,cc,fuel,email,phone)
            VALUES('12W543','Ford','Capri','Black',2012,'Coupe',2,1400,'Petrol','dman@wit.ie','0877657777')");
?>

<br />...done.
</body></html>