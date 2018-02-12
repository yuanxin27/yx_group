<html>
<body>
<head>
	<h1>Log in page/register Administrator </h1>
	<form action="login2.php" method="post">	
	AdminID: <input type="text" name="adminid" />
	Password: <input type ="password" name="adminpass" />
	<input type="submit"  value="login" name ="login_btn" />
	</form>
	
</body>
</html> 

<?php

session_start();
if(isset($_SESSION['Admin_ID']))
{
	header('Location: adhome.php');
}

?>

