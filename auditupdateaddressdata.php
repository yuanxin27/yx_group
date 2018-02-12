<?php

$db = mysqli_connect("localhost", "root", "", "cinemax movies"); //connect to database
if (!$db){
	die('Could not connect: ' . mysqli_connect_errno()); //return error is connect fail
}

if (isset($_POST['update_btnname'])) 
{	
	session_start();
	$iaddress = $_POST['iaddress'];
	$adminid = $_SESSION['Admin_ID'];
	$dusername = $_SESSION['duser3'];
	
		$sql1 = "UPDATE auditor SET address ='$iaddress'  WHERE username ='$dusername'";
		$hashing = mysqli_query($db, $sql1);
		$sql2 = "INSERT INTO log (event_id, username, target_user) VALUES (23, '$adminid', '$dusername')";
		mysqli_query($db, $sql2);
		unset($_SESSION['hash4']);
		unset($_SESSION['duser3']);
		echo "Information updated!";
		echo '<form action="adhome.php" method="post">';
		echo '<input type="submit" value="Click here to go back to home page." />';
		echo '</form>';	
	
}
else
{
	unset($_SESSION['hash4']);
	unset($_SESSION['duser3']);
	echo 'failed to update';
	echo '<form action="adhome.php" method="post">';
	echo '<input type="submit" value="Click here to go back to home page." />';
	echo '</form>';	
}
