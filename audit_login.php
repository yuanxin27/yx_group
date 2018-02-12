<html>
<body>
	<h1> AUDITOR ACCOUNT LOGIN </h1>
	<p> If you are not an auditor or an administrator, please close this page immediately. </p>
	<form action="audit_login2.php" method="post">
	Username: <input type="text" name="susername" />
	Password: <input type="password" name="spassword" />
	<input type="submit" name="loginButton" value="Login" />
</body>
</html>	

<?php

session_start();
if(isset($_SESSION['username']))
{
	header('Location: audit_home.php');
}

?>
