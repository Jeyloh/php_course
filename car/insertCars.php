<html>
<head>
<title>Carshop Admin</title>
<style type="text/css">
	td{
		font-family: tahoma, arial, verdana; 
		font-size: 10pt; 
	}
	#loginbtn{
		width:30%;
		margin-top:1em;
	}
	input, select {
		width:200px;
	}
	label {
		float:left;
	}
</style>
<?php
echo "This is the HTML Title written in a PHP Script. TODO: Remove me"
?>
</head>
<body>
	<table align="center" cellpadding="5" cellspacing="0" border="2" width="400px">
		<tr align="center" valign="top">
			<td align="left" colspan="1" rowspan="1" bgcolor="39b900">
				<h2 font-family='tahoma'>Register a Car</h2>
				<form method="GET" action="insertForm.php">
					<fieldset>
						<legend>Car Information</legend>
						<label>Registration Number</label><br>
						<input type="text" name="id" size="30" required><br>
						<label>Manufacturer</label><br>
						<input type="text" name="manufacturer" size="30" required><br>
						<label>Model</label><br>
						<input type="text" name="model" size="30" required><br>
						<label>Colour</label><br>
						<input type="text" name="colour" size="30"><br>
						<label>Year</label><br>
						<input type="text" name="year" size="30" required><br>
						<label>Doors</label><br>
						<input type="text" name="doors" size="30" required><br>
						<label>CC</label><br>
						<input type="text" name="cc" size="30"><br>
						<label>Fuel</label><br>
						<input type="text" name="fuel" size="30" required><br>
						<label>Enter Type:</label><br><select name='type' required><br>
						<option value="" disabled="disabled" selected="selected">Select Car Type<br></option>
						<option value="Saloon">Saloon</option>
						<option value="Estate">Estate</option>
						<option value="Coupe">Coupe</option>
						<option value="Hatchback">Hatchback</option>
						<option value="7 Seater">7 Seater</option>
						</select><br>
				</fieldset>
				<fieldset>
					<legend>Personal Information</legend>
					<label>Email</label><br>
					<input type="text" name="email" size="30"><br>
					<label>Phone</label><br>
					<input type="text" name="phone" size="30"><br>
				</fieldset>
					<input type="submit" value="Register Car" width="30" align="center"><input type="reset"><br>
				</form>
		</form>
	</td>
</tr>
</table>

<br>
<form method="POST" action="display_reg_cars.php">
<input type="submit" value="Display Cars">
</form>
<form method="POST" action="insertCars.php">
<input type="submit" value="Register Car">
</form>

</body>
</html>	
