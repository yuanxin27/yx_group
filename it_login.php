<html>
<head>
<body>
<h1><b> IT Personnel Login </b></h1>
<form action="it_login2.php" method="post">
	<table align="left">
		<tr>
			<td>Username:</td>
			<td><input type="text" name="uname"
			placeholder="Enter your username"></td>
		</tr>
		<tr>
			<td>Password:</td>
			<td><input type="password" name="pwd"
			placeholder="Enter your password"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="loginButton" value="Login"></td>
	</table>
</form>
</head>
</body>

<?php

session_start();
if(isset($_SESSION['uname']))
{
	header('Location: it_home.php');
}

?>

