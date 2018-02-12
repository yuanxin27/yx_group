<?php
$db = mysqli_connect("localhost", "root", "", "cinemax movies"); //connect to database
if (!$db){
    die('Could not connect: ' . mysqli_connect_errno()); //return error is connect fail
}
	session_start();
	$username = $_SESSION['username'];
	mysqli_query($db, "INSERT INTO log (event_id, username) VALUES (2, '$username')");
	session_destroy();
	unset($_SESSION['username']);
	header("location: audit_login.php");
?>