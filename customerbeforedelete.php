
<?php
session_start();

if(isset($_SESSION['iusername']))
{
	echo'<!DOCTYPE html>
	<html>
	<body>
	<h1> Deleting your account </h1>
	<b> Are you sure you want to delete your account? This cannot be undone and you will be logged out. </b>
	<br>
	<br>
	<form action="customerdeleteconfirm.php" method="post" autocomplete="off">
	<input type="submit" name="customerdeleteconfirm.php" value="Delete Account" />
	</form>
	<br>
	<br>
	<form action="customerhomeafterloginregister.php" method="post" />
	<input type="submit" name="customerhomeafterloginregister.php" value="Back to Main page" />
	</form>
	</body>
	</html>';

}
else
{
	header('Location: customerhomeafterloginregister.php');
}

?>