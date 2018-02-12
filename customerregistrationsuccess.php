<?php
session_start();
if(isset($_SESSION['iusername']))
{
	echo '
	<html>
	<head>
		<h2> Registration Complete </h2>
	</head>
		<form action="customerhome.php" method="post" >
		<input type="submit" value="Back to main page" />
		</form>
	</body>
	</html>';
	unset($_SESSION['iusername']);
	session_destroy();
}
else
{
	header('Location: customerhome.php');
}
?>