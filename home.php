<?php
	session_start();
if(isset($_SESSION['otp']))
{
	if(isset($_SESSION['Admin_ID']))
	{
		echo
		'<html>
		<head>
			<title>ADMIN HOME PAGE</title>
		</head>
		<body>
		<div class ="header">
			<h1>ADMIN Home page</h1>
			</div><h4>Welcome to Admintrator page </h4></div>


		</body>
		</html>';

	echo '
		
		<form action="button.php" method="post">
		Update/Change Auditor particulars:
		<input type="submit" name="Audit_btn" value="Update" />
		</form>

		<form action="button.php" method="post">
		Delete on Auditor acc:
		<input type="submit" name="Auditdel_btn" value="Delete" />
		</form>

		<form action="button.php" method="post">
		Update/Change ITpersonnel particulars:
		<input type="submit" name="IT_btn" value="Update" />
		</form>

		<form action="button.php" method="post">
		Delete on ITpersonnel acc:
		<input type="submit" name="ITdel_btn" value="Delete" />
		</form>

		<div><a href="logout.php">Logout</a><div>';
	}
	else
	{
		header('Location: logininput_data.php');
	}
}
else
{
	header('Location: logininput_data.php');
}
?>


