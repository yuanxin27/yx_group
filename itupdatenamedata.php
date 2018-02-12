<?php

$db = mysqli_connect("localhost", "root", "", "cinemax movies"); //connect to database
if (!$db){
	die('Could not connect: ' . mysqli_connect_errno()); //return error is connect fail
}

if (isset($_POST['update_btnname'])) 
{	session_start();
	$iname = $_POST['iname'];
	$adminid = $_SESSION['Admin_ID'];
	$dusername = $_SESSION['duser'];

	$sql = "SELECT * FROM `it personal` WHERE Username ='$dusername' ";
	$result = mysqli_query($db, $sql);
	$resulting = mysqli_fetch_assoc($result);
	if (mysqli_num_rows($result) == 1) 
	{
		$dusername = $_SESSION['duser'];
		$sql1 ="UPDATE `it personal` SET Name ='$iname'  WHERE Username ='$dusername'";
		$hashing = mysqli_query($db, $sql1);
		$sql2 = "INSERT INTO log (event_id, username, target_user) VALUES (22, '$adminid', '$dusername')";
		mysqli_query($db, $sql2);
		unset($_SESSION['hash']);
		unset($_SESSION['duser']);
		echo "Information updated!";
		echo '<form action="adhome.php" method="post">';
		echo '<input type="submit" value="Click here to go back to home page." />';
		echo '</form>';	
	}
	else
	{
		unset($_SESSION['hash']);
		unset($_SESSION['duser']);
		echo 'failed to update';
		echo '<form action="adhome.php" method="post">';
		echo '<input type="submit" value="Click here to go back to home page." />';
		echo '</form>';	
	}
}
else
{
	echo 'failed';
}
