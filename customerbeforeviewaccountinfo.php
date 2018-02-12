<!DOCTYPE html>
<html>
<body>
<?php
session_start();
if(isset($_SESSION['iusername']))
{
	echo'<form action="customerviewaccountinfo.php" method="post" autocomplete="off">
	Username: <input type="text" name="iusername" required/>
	Password: <input type="password" name="ipwd" required/><br>
	<input type="submit" name="view_btn" value="View account info" />
	</form>

	<br>
	<form action="customerhomeafterloginregister.php" method="post" />
	<input type="submit" name="customerhomeafterloginregister.php" value="Back to home page" />
	</form>';
	
}
else
{
	echo 'failed.';
}


