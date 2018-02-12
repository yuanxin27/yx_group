<!DOCTYPE html>
<html>
<body>
<?php 
 
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	if (isset($_POST['login']))
	{
		require_once 'customerlogin.php';
	}  
}
?>

<h1> Welcome to Cinemax Movies, please login</h1>
	<form action="customerlogin.php" method="post" autocomplete="off">
	Username: <input type="text" name="iusername" required/><br>
	Password: <input type="password" name="ipwd" required/><br>
	<div class="g-recaptcha" data-sitekey="6LdKP0QUAAAAACpbeKvHRWCdWq3PDKOyB4Qi2-IM"></div>
	<input type="submit" name="login_btn" value="login" /><br>
	</form>
	<form action="customerhome.php" method="post" />
	<input type="submit" name="customerhome.php" value="Back to Main page" />
	</form>
	<form action="customerforgotusernamepassword.php" method="post" />
	<input type="submit" name="customerforgotusernamepassword.php" value="Reset Password" />
	</form>
</body>	
<script src='https://www.google.com/recaptcha/api.js'></script>
</html>
