<html>
<body>
<?php
$db = mysqli_connect("localhost","root","","cinemax movies"); //connect to database
if (!$db){
	die('Could not connect: ' . mysqli_connect_errno()); //return error is connect fail
}
session_start();
if(isset($_SESSION['uname']))
{
	$username = $_SESSION['uname'];
	$bottomValue= 60*8;
	$upperValue = 60*21	;
	$currentValue = date("H")*60 + date("i") + 420;
	if (($currentValue >= $bottomValue) && ($currentValue <= $upperValue))
	{
		mysqli_query($db , "INSERT INTO log (event_id, username) VALUES (8, '$username')");
		echo "You are now logged in.";
		echo "Welcome, ";
		echo $username;
		echo '<form action="it_reenable.php" method="post">';
		echo '<input type="submit" value="Reset disabled accounts" name="enableButton" />';
		echo '</form>';
	}
	else
	{
		mysqli_query($db, "INSERT INTO disabled_it VALUES ('$username')");
		header('Location: it_faillogin2.php');
	}
	echo '<form action="it_logout.php" method="post">';
	echo '<input type="submit" name="logoutButton2" value="Logout" />';
	echo '</form>';
}
else
{
	header('Location: it_login.php');
}
?>
</body>
</html>