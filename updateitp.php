<?php
session_start();
$db = mysqli_connect("localhost","root","","cinemax movies"); //connect to database
if (!$db){
	die('Could not connect: ' . mysqli_connect_errno()); //return error is connect fail
}

if(isset($_SESSION['Admin_ID']))
{
	if(isset($_POST['verifyButton']))
	{
		$username = $_SESSION['duser'];
		$sql = "SELECT Password from `it personal` WHERE Username = '$username'";
		$result = mysqli_query($db, $sql);
		$result2 = mysqli_fetch_assoc($result);
		$hash = $result2['Password'];

		$itpass = $_POST['itpass'];

		
		if (password_verify($itpass, $hash)) 
		{
			$_SESSION['hash'] = $hash;
			$_SESSION['duser'] = $username;
			header('Location: it_update2.php');
		}
		else
		{
			echo "Wrong password.";
			echo "<form action=\"button.php\" method=\"post\">
			<input type='submit' name='home_btn' value='Home page' />
			</form>";
		}
	}
	else
	{
		$_SESSION['duser'] = $_GET['Username'];
		echo '<form action="updateitp.php" method="post">';
		echo "Enter password for user $_GET[Username]: <input type =\"password\" name=\"itpass\" /> ";
		echo '<input type="submit"  value="Submit" name ="verifyButton"/>';
		echo '</form>';
	}
}
		
	
?>