<?php

$db = mysqli_connect("localhost", "root", "", "cinemax movies"); //connect to database
if (!$db){
	die('Could not connect: ' . mysqli_connect_errno()); //return error is connect fail
}

if (isset($_POST['update_btnname'])) 
{	
	session_start();
	$username = $_SESSION['duser3'];
	$icontact = $_POST['icontact'];
	$num_length = strlen((string)$icontact);
	$adminid = $_SESSION['Admin_ID'];
	
	$sql = "SELECT * FROM auditor WHERE username='$username' ";
	$result = mysqli_query($db, $sql);
	$resulting = mysqli_fetch_assoc($result);
	if (mysqli_num_rows($result) == 1) 
	{
		$mysql_get_contact = mysqli_query($db, "SELECT * FROM auditor where contact='$icontact'");
		$get_rows3 = mysqli_num_rows($mysql_get_contact);
		if($get_rows3 == 1)
		{
				echo "The contact number you entered is already in use.";
				echo '<form action="audit_update2.php" method="post">';
				echo '<input type="submit" value="Click here to go back." />';
				echo '</form>';
		}
		else
		{
			if ($num_length > 8) 
			{
				$error = "Contact Number incorrect, please input only 8 numbers!";
				if($error == "Contact Number incorrect, please input only 8 numbers!")
				{
					echo "$error";
					echo '<form action="audit_update2.php" method="post">';
					echo '<input type="submit" value="Click here to go back." />';
					echo '</form>';
				} 
			}
			else if ($num_length < 8)
			{
				$error = "Contact Number incorrect, please input only 8 numbers!";
				if($error == "Contact Number incorrect, please input only 8 numbers!")
				{
					echo "$error";
					echo '<form action="audit_update2.php" method="post">';
					echo '<input type="submit" value="Click here to go back." />';
					echo '</form>';
				} 
			}
			else
			{
				$sql1 ="UPDATE auditor SET contact ='$icontact'  WHERE username ='$username'";
				$hashing = mysqli_query($db, $sql1);
				$sql2 = "INSERT INTO log (event_id, username, target_user) VALUES (23, '$adminid', '$username')";
				mysqli_query($db, $sql2);
				unset($_SESSION['hash4']);
				unset($_SESSION['duser3']);
				echo "Information updated!";
				echo '<form action="adhome.php" method="post">';
				echo '<input type="submit" value="Click here to go back to home page." />';
				echo '</form>';	
			}
		}
	}
	else
	{
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
