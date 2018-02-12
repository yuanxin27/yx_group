<?php

$db = mysqli_connect("localhost", "root", "", "cinemax movies"); //connect to database
if (!$db){
	die('Could not connect: ' . mysqli_connect_errno()); //return error is connect fail
}

if (isset($_POST['update_btnname'])) 
{	session_start();
	$iname = $_POST['iname'];
	$username = $_SESSION['iusername'];

	$sql = "SELECT * FROM customer WHERE Customer_Username='$username' ";
	$result = mysqli_query($db, $sql);
	$resulting = mysqli_fetch_assoc($result);
	if (mysqli_num_rows($result) == 1) 
	{
		$sql1 ="UPDATE customer SET Customer_Name ='$iname'  WHERE Customer_Username ='$username'";
		$hashing = mysqli_query($db, $sql1);
		$sql2 = "INSERT INTO log (event_id, username) VALUES (26, '$username')";
		mysqli_query($db, $sql2);
		echo "Information updated!";
		echo '<form action="customerhomeafterloginregister.php" method="post">';
		echo '<input type="submit" value="Click here to go back to home page." />';
		echo '</form>';	
	}
	else
	{
		echo 'failed to update';
		echo '<form action="customerhomeafterloginregister.php" method="post">';
		echo '<input type="submit" value="Click here to go back to home page." />';
		echo '</form>';	
	}
}
else
{
	echo 'failed';
}
