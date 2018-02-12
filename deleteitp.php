<?php
session_start();
$db = mysqli_connect("localhost","root","","cinemax movies"); //connect to database
if (!$db){
	die('Could not connect: ' . mysqli_connect_errno()); //return error is connect fail
}


if(isset($_POST['verifyButton2']))
{
	$sql2 = "SELECT * FROM `it personal` WHERE Username = '$_SESSION[duser2]'";
	$result = mysqli_query($db, $sql2);
	$adminid = $_SESSION['Admin_ID'];
	
	if(mysqli_num_rows($result) == 1)
	{
		$username = $_SESSION['duser2'];
		$sql = "SELECT Password from `it personal` WHERE Username = '$username'";
		$result = mysqli_query($db, $sql);
		$result2 = mysqli_fetch_assoc($result);
		$hash = $result2['Password'];

		$itpass2 = $_POST['itpass2'];

		
		if (password_verify($itpass2, $hash)) 
		{
			$_SESSION['hash2'] = $hash;
			$_SESSION['duser2'] = $username;
			header('Location: it_delete.php');
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
	$_SESSION['duser2'] = $_GET['Username'];
	echo '<form action="deleteitp.php" method="post">';
	echo "Enter password for user $_GET[Username]: <input type =\"password\" name=\"itpass2\" /> ";
	echo '<input type="submit"  value="Submit" name ="verifyButton2"/>';
	echo '</form>';
	echo '<br>';
	echo '<b> Deleting an auditor account cannot be undone! </b>';
}

		
	
?>