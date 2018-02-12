<html>
	<h1> Login Page </h1>
<body>
<?php

$db = mysqli_connect("localhost", "root", "", "cinemax movies"); //connect to database
if (!$db)
{
	die('Could not connect: ' . mysqli_connect_errno()); //return error is connect fail
}

require_once "recaptchalib.php";

if (isset($_POST['login_btn']))
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
		
		$sql = "SELECT * FROM customer WHERE Customer_Username='$iusername'";
		$resulting = mysqli_query($db, $sql);
		$result = mysqli_fetch_assoc($resulting);
		if ( password_verify($ipwd, $result['Customer_Password'])) 
		{	
			if(mysqli_num_rows($resulting) == 1) 
			{
				$_SESSION['iusername'] = $iusername;
				$sql2 = "INSERT INTO log (event_id, username) VALUES (10, '$iusername')";
				mysqli_query($db, $sql2);
				header("location: customerhomeafterloginregister.php");
			}
			else
			{
				header("location: customerfailedlogin.php");
			}
		}
		else 
		{
			echo "Password incorrect";
			echo '<form action="customerhomeafterloginregister.php" method="post">';
				echo '<input type="submit" value="Click here to go back to home page." />';
				echo '</form>';	
		}
	}
	else
	{
		header("location: customerbeforelogin.php");
	}
}
else 
{
	echo "Failed to Login";
}
?>
</body>
</html>
