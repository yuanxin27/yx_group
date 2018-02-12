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
	if(isset($_POST['enableButton']))
	{
		echo "<form action='it_enable2.php' method='post'>";
		echo "Enter Account Username to Enable: <input type='text' name='iusername'>";
		echo "<input type='submit' name='enable2' value='Submit' />";
		echo "</form>";
		echo "<br>";
		echo "<form action=it_home.php method=post>";
		echo "<input type=submit value=Back />";
		echo "</form>";
	}
	else
	{
		header('Location: it_login.php');
	}
}
else
{
    header('Location: it_login.php');
}
?>
