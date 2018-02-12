<?php
$db = mysqli_connect("localhost", "root", "", "cinemax movies"); //connect to database
if (!$db){
    die('Could not connect: ' . mysqli_connect_errno()); //return error is connect fail
}
	session_start();
	$username = $_SESSION['uname'];
	mysqli_query($db, "INSERT INTO log (event_id, username) VALUES (9, '$username')");
	session_destroy();
	unset($_SESSION['uname']);
	header("location: it_login.php");
?>