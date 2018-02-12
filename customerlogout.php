<?php
$db = mysqli_connect("localhost", "root", "", "cinemax movies"); //connect to database
if (!$db)
{
	die('Could not connect: ' . mysqli_connect_errno()); //return error is connect fail
}
	session_start();
	$iusername = $_SESSION['iusername'];
	$sql2 = "INSERT INTO log (event_id, username) VALUES (11, '$iusername')";
	mysqli_query($db, $sql2);
	session_destroy();
	unset($_SESSION['iusername']);
	header("location: customerhome.php");
?>