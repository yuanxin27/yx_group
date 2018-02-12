<?php
 
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	if (isset($_POST['delete_btn']))
	{
		require_once 'customerdeleteaccount.php';
	}
}


session_start();

if(isset($_SESSION['iusername']))
{
	echo'<!DOCTYPE html>
	<html>
	<body>
	<h1> Please enter your username and password before we delete your account.</h1>
	<form action="customerdeleteaccount.php" method="post" >
	Username: <input type="text" name="iusername" required/><br>
	Password: <input type="password" name="ipwd" required/><br>
	<input type="submit" name="delete_btn" value="Yes, Delete Account" />
	<div class="g-recaptcha" data-sitekey="6LdKP0QUAAAAACpbeKvHRWCdWq3PDKOyB4Qi2-IM"></div>
	</form>
	
	<form action="customerhomeafterloginregister.php" method="post" />
	<input type="submit" name="customerhomeafterloginregister.php" value="Back to Main page" />
	</form>
	
	</body>
	</html>';
}
else
{
	header('Location: customerhomeafterloginregister.php');
}

?>
<html>
<script src='https://www.google.com/recaptcha/api.js'></script>
</html>