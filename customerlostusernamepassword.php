<!DOCTYPE html>
<html>
<body>
<?php 
$db = mysqli_connect("localhost", "root", "", "cinemax movies"); //connect to database
if (!$db)
{
	die('Could not connect: ' . mysqli_connect_errno()); //return error is connect fail
}

require_once "recaptchalib.php";

if (isset($_POST['lost']))
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
		$icontact = $_POST['icontact'];
		$iusername = $_POST['iusername'];
			
		$sql = "SELECT * FROM customer WHERE Customer_Contact_No='$icontact' AND Customer_Username='$iusername' ";
		$result = mysqli_query($db, $sql);
		if (mysqli_num_rows($result) == 1) 
		{
			$_SESSION['icontact'] = $icontact;
			$_SESSION['iusername'] = $iusername;
			header('Location: customerbeforeupdatelostpassword.php');
		}
		else
		{
			echo "Wrong Username or Contact Number. Please Try Again.";
			echo '<form action="customerforgotusernamepassword.php" method="post" >';
			echo '<input type="submit" value="Back to previous page" />';
			echo '</form>';
		}
	}
	else
	{
		header ("location: customerforgotusernamepassword.php");
	}
}
else
{
		echo "Captcha failed";
}
		
		
		
?>
</body>
</html>

