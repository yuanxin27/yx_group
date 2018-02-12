<!DOCTYPE html>
<html>
<body>
<?php
session_start();
if(isset($_SESSION['iusername'])) 
{	
	echo '<h1> Update User Information </h1>
	
	<form action="customerupdatename.php" method="post" >
	<input type="submit" name="customerupdatename.php" value="Change Name" />
	</form><br>
	
	<form action="customerupdatecontact.php" method="post" >
	<input type="submit" name="customerupdatecontact.php" value="Change Contact No" />
	</form><br>
	
	<form action="customerforgotusernamepassword.php" method="post" >
	<input type="submit" name="customerforgotusernamepassword.php" value="Reset Password" />
	</form><br>
	
	<form action="customerhomeafterloginregister.php" method="post" >
	<input type="submit" name="customerhomeafterloginregister.php" value="Back to home page" />
	</form><br>
	
	<form action="customerbeforedelete.php" method="post" >
	<input type="submit" name="customerbeforedelete.php" value="Delete Account"/>
	</form><br>
	
</body>
</html>';
}
else
{
	echo 'failed';
}