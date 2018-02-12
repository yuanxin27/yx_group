<?php
session_start();

if(isset($_SESSION['iusername']))
{
	echo '<!DOCTYPE html>
	<html>
	<body>

	<h1> Update Password </h1>
		<form action="customerupdatelostpassword.php" method="post" autcomplete="off">
		Password: <input type="password" name="ipwd" required/>
		Re-type Password: <input type="password" name="ipwd2" required/>
		<input type="submit" name="update_lost" value="update" />
		</form>
		<form action="customerbeforelogin.php" method="post" >
		<input type="submit" name="customerbeforelogin.php" value="Back to Login" />
		</form>
	</body>
	</html>';
}
else
{
	header('Location: customerbeforelogin.php');
}

?>