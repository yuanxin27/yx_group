<html>
<body>
<b><center>LOGIN</center></b>
<?php
$db = mysqli_connect("localhost","root","","cinemax movies"); //connect to database
if (!$db){
	die('Could not connect: ' . mysqli_connect_errno()); //return error is connect fail
}

if (isset($_POST['loginButton'])) 
{
	session_start();
	$susername = $_POST['susername'];
	$spassword = $_POST['spassword'];
	$sql = "SELECT * FROM auditor WHERE username='$susername'";
	$result = mysqli_query($db, $sql);
	if (mysqli_num_rows($result) == 1) 
	{
		// if username exists
		$query = "SELECT * FROM disabled_auditor WHERE username = '$susername'";
		$result2 = mysqli_query($db, $query);
		if(mysqli_num_rows($result2) > 3)
		{
			// to check if account is disabled
			echo "Account Disabled!";
			echo '<form action="audit_login.php" method="post">';
			echo '<input type="submit" name="backButton" value="Back" />';
			echo '</form>';
		}
		else if(mysqli_num_rows($result2) == 3)
		{
			// to add into audit logs
			mysqli_query($db, "INSERT INTO log (event_id, username) VALUES (16, '$susername')");
			// echo account is disabled
			echo "Account Disabled!";
			// append username into database a 4th time so audit logs don't repeat
			mysqli_query($db, "INSERT INTO disabled_auditor VALUES ('$susername')");
			echo '<form action="audit_login.php" method="post">';
			echo '<input type="submit" name="backButton" value="Back" />';
			echo '</form>';
		}
		else
		{	
			// if username and account is not disabled
			$sql3 = "SELECT password from `auditor` WHERE username = '$susername'";
			$result3 = mysqli_query($db, $sql);
			$result4 = mysqli_fetch_assoc($result3);
			if ( password_verify($spassword, $result4['password'])) 
			{	
				// if password is correct
				echo "Password correct";
				$_SESSION['username'] = $susername;
				header('location: audit_home.php');
			}
			else 
			{	
				// if password is wrong
				$query = "SELECT * FROM disabled_auditor WHERE username = '$susername'";
				$result2 = mysqli_query($db, $query);
				$sql2 = "SELECT * FROM `auditor` WHERE username='$susername'";
				$result3 = mysqli_query($db, $sql2);
				if(mysqli_num_rows($result3) == 1)
				{
					if(mysqli_num_rows($result2) > 3)
					{
						echo "Account Disabled!";
						echo '<form action="audit_login.php" method="post">';
						echo '<input type="submit" name="backButton" value="Back" />';
						echo '</form>';
					}
					else if(mysqli_num_rows($result2) == 3)
					{
						// to add into audit logs
						mysqli_query($db, "INSERT INTO log (event_id, username) VALUES (16, '$susername')");
						// echo account is disabled
						echo "Account Disabled!";
						// append username into database a 4th time so audit logs don't repeat
						mysqli_query($db, "INSERT INTO disabled_auditor VALUES ('$susername')");
						echo '<form action="audit_login.php" method="post">';
						echo '<input type="submit" name="backButton" value="Back" />';
						echo '</form>';
					}
					else
					{
						mysqli_query($db, "INSERT INTO disabled_auditor VALUES ('$susername')");
						echo "Wrong Password! Entering the wrong password 3 times will disable your account. Please contact administrator if it is disabled.";
						echo '<form action="audit_login.php" method="post">';
						echo '<input type="submit" name="backButton" value="Back" />';
						echo '</form>';
					}
				}
				else
				{
					header('Location: failedlogin.php');
				}
			}
		}

	}	
	else
	{
		header('Location: failedlogin.php');
	}
}
?>
</body>
</html>
