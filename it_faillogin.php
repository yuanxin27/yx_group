<html>
<body>
	<p> LOGIN FAILED </p>
	<form action="it_login.php" method="post">
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
	unset($_SESSION['uname']);
	session_destroy();
	
?>