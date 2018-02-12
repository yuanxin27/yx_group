<html>
<body>
<?php
$db = mysqli_connect("localhost", "root", "", "cinemax movies"); //connect to database
if (!$db){
    die('Could not connect: ' . mysqli_connect_errno()); //return error is connect fail
}
if (isset($_POST['enable2'])) 
{
	$iusername = $_POST['iusername'];
	session_start();
	if(isset($_SESSION['Admin_ID']))
	{
		$username = $_SESSION['Admin_ID'];
		$sql = mysqli_query($db, "SELECT Username from disabled_it where Username = '$iusername'");
		
		if(mysqli_num_rows($sql) >= 1)
		{
			mysqli_query($db, "DELETE FROM disabled_it WHERE Username = '$iusername'");
			mysqli_query($db, "INSERT INTO log (event_id, username, target_user) VALUES (14, '$username', '$iusername')");
			echo "User successfully Enabled.";
			echo '<form action="adhome.php" method="post">';
			echo '<input type="submit" name="homeButton" value="Back to Home Page" />';
			echo '</form>';
		}
		else
		{
			echo "User does not exist, or user has already been enabled.";
			echo '<form action="adhome.php" method="post">';
			echo '<input type="submit" name="homeButton" value="Back to Home Page" />';
			echo '</form>';
		}
	}
	else
	{
		header('Location: logininput_data.php');
	}
}
else
{
	header('Location: adhome.php');
}

?>
</body>
</html>