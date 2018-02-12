<?php
session_start();
if (isset($_SESSION['Admin_ID']))
{
	echo'
	<html>
	<header>
	<title>HTML Form</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="http://studentstutorial.com/div/d.css">
	</header>
	<body>
		<div class="w3-row">
		<div class="w3-half w3-card-2 w3-round">
		<div class="w3-container w3-center w3-red">
		<h2>Otp Confirmation</h2>
	</div>
	<br>
	<form class="w3-container" method="post" action="process1.php">
	<label class="w3-label w3-text-black"><b>We have sent a One-Time Password (OTP) to the email you registered with. Click the button below to enter your OTP.</b></label>
	<p class="w3-center"><button class="w3-btn w3-red w3-round" style="width:100%;height:40px" name="btn-save">Enter OTP</button></p>
	</form>
	<div class="w3-container w3-center w3-light-grey">
	</div>
	</div>
	<div class="w3-half">
	</div>
	</div>
	</body>
	</html>';
}
else
{
	echo '<form action="admin_login.php" method="post">';
	echo '<input type="submit" value="Click here to go back." />';
	echo '</form>';
}
?>