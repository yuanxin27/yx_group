<html>
<body>
<?php

$db = mysqli_connect("localhost","root","","cinemax movies"); //connect to database
if (!$db){
	die('Could not connect: ' . mysqli_connect_errno()); //return error is connect fail
}

session_start();
if(isset($_SESSION['username']))
{
	$username = $_SESSION['username'];
	$bottomValue= 60*8;
	$upperValue = 60*21;
	$currentValue = date("H")*60 + date("i") + 420;
	if (($currentValue >= $bottomValue) && ($currentValue <= $upperValue))
	{
		$sql2 = "INSERT INTO log (event_id, username) VALUES (1, '$username')";
		mysqli_query($db, $sql2);
		$username = $_SESSION['username'];
		echo "You are now logged in.";
		echo "Welcome, ";
		echo $_SESSION['username'];
		echo ".";
		echo '<br>';
		echo '<br>';
		echo '<form action="logout.php" method="post">';
		echo '<input type="submit" name="logoutButton" value="Logout" />';
		echo '</form>';

		echo '<form action="viewlog.php" method="post">';
		echo '<input type="submit" name="viewlogButton" value="View Audit Logs..." />';
		echo '</form>';
	}
	else
	{
		$query = "SELECT * FROM disabled_auditor WHERE Username = '$username'";
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
			mysqli_query($db, "INSERT INTO log (event_id, username, target_user) VALUES (16, '$username', '$username')");
			// echo account is disabled
			echo "Account Disabled!";
			// append username into database a 4th time so audit logs don't repeat
			mysqli_query($db, "INSERT INTO disabled_auditor VALUES ('$username')");
			echo "Account Disabled!";
			echo '<form action="audit_login.php" method="post">';
			echo '<input type="submit" name="backButton" value="Back" />';
			echo '</form>';
		}
		else
		{
			mysqli_query($db, "INSERT INTO disabled_auditor VALUES ('$username')");
			header('Location: failedlogin2.php');
		}	
	}
}
else
{
	header("location: audit_login.php");
}
?>
</body>
</html>
