<?php
	
$db = mysqli_connect("localhost", "root", "", "cinemax movies"); //connect to database
if (!$db)
{
	die('Could not connect: ' . mysqli_connect_errno()); //return error is connect fail
}

?>



<?php
session_start();
if(isset($_SESSION['otp']))
{
	if (isset($_SESSION['iemail']))
	{
		if(isset($_POST['save']))
		{
			$rno=$_SESSION['otp'];
			$urno=$_POST['otpvalue'];
			if(!strcmp($rno,$urno))
			{
				$iusername = $_SESSION['iusername'];
				$iemail = $_SESSION['iemail'];
				$icontact = $_SESSION['icontact'];
				$iname = $_SESSION['iname'];
				$ihash = $_SESSION['ihash'];
				$sql = "INSERT INTO `customer` (Customer_Name, Customer_Username, Customer_Contact_No, Customer_Password, Customer_Email) VALUES
				('$iname','$iusername','$icontact','$ihash','$iemail')";
				mysqli_query($db, $sql);
				$sql2 = "INSERT INTO log (event_id, username, target_user) VALUES (25, '$iusername', '$iusername')";
				mysqli_query($db, $sql2);
				unset($_SESSION['iemail']);
				unset($_SESSION['icontact']);
				unset($_SESSION['ihash']);
				unset($_SESSION['iname']);
				header ('location: customerregistrationsuccess.php');
			}
			else
			{
				echo "<p>Invalid OTP</p>";
			}
		}
		//resend OTP
		if(isset($_POST['resend']))
		{
			$message="<p class='w3-text-green'>Sucessfully send OTP to your mail.</p>";
			$rno=$_SESSION['otp'];
			$to=$_SESSION['iemail'];
			$subject = "OTP";
			$txt = "OTP: ".$rno."";
			$headers = "From: 1604392I@gmail.com" . "\r\n" .
			"CC: 1604392I@gmail.com";
			mail($to,$subject,$txt,$headers);
			$message="<p class='w3-text-green w3-center'><b>Successfully resend OTP to your mail.</b></p>";
		}
	}
	else
	{
		header('Location: customerhome.php');
	}
}
else
{
	header('Location: customerbeforeregister.php');
}
?>


<!DOCTYPE html>
<html>
<header>
<title>OTP verification</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://studentstutorial.com/div/d.css">
<style>
a{
text-decoration:none;
}
</style>
<header>
<body>
<br>
<div class="w3-row">
<div class="w3-half w3-card-2 w3-round">
<div class="w3-container w3-center w3-red">
<h2>OTP verification</h2>
</div>
<br>
<form class="w3-container" method="post" action="">
<br>
<br>
<p><input class="w3-input w3-border w3-round" type="password" placeholder="OTP" name="otpvalue"></p>
<p class="w3-center"><button class="w3-btn w3-red w3-round" style="width:100%;height:40px" name="save">Submit</button></p>
<p class="w3-center"><button class="w3-btn w3-red w3-round" style="width:100%;height:40px" name="resend">Resend</button></p>
</form>
<div><?php if(isset($message)) { echo $message; } ?>
</div>
<br>
<div class="w3-container w3-center w3-light-grey">
</div>
</div>
<div class="w3-half">
</div>
</div>
</body>
</html>