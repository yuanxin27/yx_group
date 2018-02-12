<html>
<body>
	<p> You cannot login between 9pm and 8am. Attempting to do so 3 times or entering a wrong password 3 times will disable your account.  </p>
	<form action="audit_login.php" method="post">
	<input type="submit" value="Click Here to go back to Login." />
	</form>
</body>
</html>	
<?php
$db = mysqli_connect("localhost", "root", "", "cinemax movies"); //connect to database
if (!$db){
    die('Could not connect: ' . mysqli_connect_errno()); //return error is connect fail
}
	session_start();
	unset($_SESSION['username']);
	session_destroy();
	
?>
