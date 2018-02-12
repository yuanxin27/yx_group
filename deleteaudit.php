<?php
session_start();
$db = mysqli_connect("localhost","root","","cinemax movies"); //connect to database
if (!$db){
	die('Could not connect: ' . mysqli_connect_errno()); //return error is connect fail
}



if(isset($_POST['verifyButton4']))
{
	$sql2 = "SELECT * FROM `auditor` WHERE Username = '$_SESSION[user]'";
	$result = mysqli_query($db, $sql2);
	$adminid = $_SESSION['Admin_ID'];
	
	if(mysqli_num_rows($result) == 1)
	{

		$username = $_SESSION['user'];
		$sql = "SELECT password from `auditor` WHERE username = '$username'";
		$result = mysqli_query($db, $sql);
		$result2 = mysqli_fetch_assoc($result);
		$hash = $result2['password'];

		$auditpass2 = $_POST['auditpass2'];

		
		if (password_verify($auditpass2, $hash)) 
		{
			$_SESSION['hash9'] = $hash;
			$_SESSION['duser9'] = $username;
			header('Location: audit_delete.php');
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
		echo "User does not exist!";
	}
}
else
{
	$_SESSION['user'] = $_GET['username'];
	echo '<form action="deleteaudit.php" method="post">';
	echo "Enter password for user $_GET[username]: <input type =\"password\" name=\"auditpass2\" /> ";
	echo '<input type="submit"  value="Submit" name ="verifyButton4"/>';
	echo '</form>';
	echo '<br>';
	echo '<b> Deleting an auditor account cannot be undone! </b>';
}

		
	
?>