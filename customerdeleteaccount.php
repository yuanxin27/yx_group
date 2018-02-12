<html>
<body>
<?php

$db = mysqli_connect("localhost", "root", "", "cinemax movies"); //connect to database
if (!$db){
	die('Could not connect: ' . mysqli_connect_errno()); //return error is connect fail
}

require_once "recaptchalib.php";

if (isset($_POST['delete_btn']))
{
	$secret = "6LdKP0QUAAAAAIOc9cFjYJ4ip5UV0pEyMloy3r5B";
	$response = null;
	$reCaptcha = new ReCaptcha($secret);

	if (isset($_POST["g-recaptcha-response"]))
	{
		$response = $reCaptcha->verifyResponse
		(
			$_SERVER["REMOTE_ADDR"],
			$_POST["g-recaptcha-response"]
		);
	}
	
	if ($response != null && $response->success)
	{
		session_start();
		
		$iusername = $_POST['iusername'];
		$ipwd = $_POST['ipwd'];
		$iusername = $_SESSION['iusername'];
		
		$sql = "SELECT * FROM customer WHERE Customer_Username='$iusername'";
		$result = mysqli_query($db, $sql);
		$resulting = mysqli_fetch_assoc($result);
		if ( password_verify($ipwd, $resulting['Customer_Password'])) 
		{	
			if (mysqli_num_rows($result) == 1) 
			{
				$sql1 ="DELETE FROM customer WHERE Customer_Username ='$iusername'";
				mysqli_query($db, $sql1);
				$sql2 = "INSERT INTO log (event_id, username, target_user) VALUES (27, '$iusername', '$iusername')";
				mysqli_query($db, $sql2);
				echo "Your account has been deleted.";
				echo '<form action="customerhomeafterloginregister.php" method="post">';
				echo '<input type="submit" value="Click here to go back to home page." />';
				echo '</form>';	
				unset($_SESSION['iusername']);
				session_destroy();
			}
			else
			{
				echo "Wrong password or username";
				echo '<form action="customerdeleteconfirm.php" method="post" >';
				echo '<input type="submit" value="Back to previous page" />';
				echo '</form>';
			}
		}
		else
		{
			echo 'Wrong password';
			echo '<form action="customerhomeafterloginregister.php" method="post">';
			echo '<input type="submit" value="Click here to go back to home page." />';
			echo '</form>';	
		}
	}		
	else
	{
		header('location: customerdeleteconfirm.php');
	}

}
else
{
	echo "Failed to delete";
}

?>
</body>
</html>
