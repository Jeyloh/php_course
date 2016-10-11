	
<html>
<head>
<title>Database Interface</title>
<style type="text/css">
	td {
		font-family: tahoma, arial, verdana; 
		font-size: 10pt; 
	}
	#loginbtn{
		width:50%;
		margin-top:1em;
	}
</style>
<?php
echo "This is the HTML Title written in a PHP Script. TODO: Remove me"
?>

</head>
<body>
	<table align="center" cellpadding="5" cellspacing="0" border="2" width="300px">
		<tr align="center" valign="top">
			<td align="center" colspan="1" rowspan="1" bgcolor="64b1ff">
				<form method="POST" action="login_form.php">
					Username<input type="text" name="username" size="30"><br>
					Password<input type="password" name="password" size="30"><br>
					<button id="loginbtn" name="login" width="30">Try your luck!</button><br>


				</form>
			</td>
		</tr>
	</table>
</body>
</html>	