<?php
	session_start();
if(isset($_SESSION['otp1']))
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
		Update/Change IT Personnel particulars:
		<input type="submit" name="IT_btn" value="Update" />
		</form>

		<form action="button.php" method="post">
		Delete on IT Personnel acc:
		<input type="submit" name="ITdel_btn" value="Delete" />
		</form>
		
		<form action="button.php" method="post">
		Create new IT Personnel account:
		<input type="submit" name="Reg_btn1" value="Create" />
		</form>
		
		<form action="button.php" method="post">
		Create new Auditor Account:
		<input type="submit" name="Reg_btn2" value="Create" />
		</form>
		
		<form action="button.php" method="post">
		Enable IT Personnel Account:
		<input type="submit" name="ITen_btn" value="Enable" />
		</form>

		<div><a href="logout2.php">Logout</a><div>';
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


