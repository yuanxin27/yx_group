<html>
<body>
<b><center>LOGIN</center></b>
<?php
$db = mysqli_connect("localhost","root","","cinemax movies"); //connect to database
if (!$db)
{
	die('Could not connect: ' . mysqli_connect_errno()); //return error is connect fail
}

if (isset($_POST['loginButton'])) 
{
	session_start();
	$uname = $_POST['uname'];
	$pwd = $_POST['pwd'];
	$sql = "SELECT * FROM `it personal` WHERE Username='$uname'";
	$result = mysqli_query($db, $sql);
	if (mysqli_num_rows($result) == 1) 
	{		
		// if username exists
		$query = "SELECT * FROM disabled_it WHERE Username = '$uname'";
		$result2 = mysqli_query($db, $query);
		if(mysqli_num_rows($result2) > 3)
		{
			// to check if account is disabled
			echo "Account Disabled!";
			echo '<form action="it_login.php" method="post">';
			echo '<input type="submit" name="backButton" value="Back" />';
			echo '</form>';
		}
		else if(mysqli_num_rows($result2) == 3)
		{
			// to add into audit logs
			mysqli_query($db, "INSERT INTO log (event_id, username) VALUES (15, '$uname')");
			// echo account is disabled
			echo "Account Disabled!";
			// append username into database a 4th time so audit logs don't repeat
			mysqli_query($db, "INSERT INTO disabled_it VALUES ('$uname')");
			echo '<form action="it_login.php" method="post">';
			echo '<input type="submit" name="backButton" value="Back" />';
			echo '</form>';
		}
		else
		{	
			// if username and account is not disabled
			$sql = "SELECT Password from `it personal` WHERE Username = '$uname'";
			$result3 = mysqli_query($db, $sql);
			$result4 = mysqli_fetch_assoc($result3);
			if ( password_verify($pwd, $result4['Password'])) 
			{	
				// if password is correct
				echo "Password correct";
				$_SESSION['uname'] = $uname;
				header('location: it_home.php');
			}
			else 
			{	
				// if password is wrong
				$query = "SELECT * FROM disabled_it WHERE Username = '$uname'";
				$result2 = mysqli_query($db, $query);
				$sql2 = "SELECT * FROM `it personal` WHERE Username='$uname'";
				$result3 = mysqli_query($db, $sql2);
				if(mysqli_num_rows($result3) == 1)
				{
					if(mysqli_num_rows($result2) > 3)
					{
						echo "Account Disabled!";
						echo '<form action="it_login.php" method="post">';
						echo '<input type="submit" name="backButton" value="Back" />';
						echo '</form>';
					}
					else if(mysqli_num_rows($result2) == 3)
					{
						// to add into audit logs
						mysqli_query($db, "INSERT INTO log (event_id, username) VALUES (15, '$uname')");
						// echo account is disabled
						echo "Account Disabled!";
						// append username into database a 4th time so audit logs don't repeat
						mysqli_query($db, "INSERT INTO disabled_it VALUES ('$uname')");
						echo '<form action="it_login.php" method="post">';
						echo '<input type="submit" name="backButton" value="Back" />';
						echo '</form>';
					}
					else
					{
						mysqli_query($db, "INSERT INTO disabled_it VALUES ('$uname')");
						echo "Wrong Password!";
						echo '<br>';
						echo "Entering the wrong password 3 times will disable your account";
						echo '<br>';
						echo "Please contact administrator if it is disabled.";
						echo '<br>';
						echo '<form action="it_login.php" method="post">';
						echo '<input type="submit" name="backButton" value="Back" />';
						echo '</form>';
					}
				}
				else
				{
					header('Location: it_faillogin.php');
				}
			}
		}	
	}
	else
	{
		// if username is invalid
		header('Location: it_faillogin.php');
	}
}
else
{
	header('Location: it_login.php');
}
?>
</body>
</html>
