
<?php
$db = mysqli_connect("localhost","root","","cinemax movies"); //connect to database
	if (!$db){
		die('Could not connect: ' . mysqli_connect_errno()); //return error is connect fail
	}

session_start();
$adminid = $_SESSION['Admin_ID'];
mysqli_query($db , "INSERT INTO log (event_id, username) VALUES (13, '$adminid')");
unset($SESSION['Admin_ID']);
unset($SESSION['otp1']);
session_destroy();
header("Location: logininput_data.php");
?>