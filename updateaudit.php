<?php
session_start();
$db = mysqli_connect("localhost","root","","cinemax movies"); //connect to database
if (!$db){
	die('Could not connect: ' . mysqli_connect_errno()); //return error is connect fail
}

if(isset($_SESSION['Admin_ID']))
{
	if(isset($_POST['verifyButton3']))
	{
		$username = $_SESSION['duser3'];
		$sql = "SELECT password from `auditor` WHERE username = '$username'";
		$result = mysqli_query($db, $sql);
		$result2 = mysqli_fetch_assoc($result);
		$hash = $result2['password'];

		$auditpass = $_POST['auditpass'];

		
		if (password_verify($auditpass, $hash)) 
		{
			$_SESSION['hash4'] = $hash;
			$_SESSION['duser3'] = $username;
			header('Location: audit_update2.php');
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
		$_SESSION['duser3'] = $_GET['username'];
		echo '<form action="updateaudit.php" method="post">';
		echo "Enter password for user $_GET[username]: <input type =\"password\" name=\"auditpass\" /> ";
		echo '<input type="submit"  value="Submit" name ="verifyButton3"/>';
		echo '</form>';
	}
}
		
	
?>