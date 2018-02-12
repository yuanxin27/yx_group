<!DOCTYPE html>
<html>
<body>
<?php 
 
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	if (isset($_POST['lost']))
	{
		require_once 'customerlostusernamepassword.php';
	}  
}
?>
<h1> Reset Password? </h1>
	<form action="customerlostusernamepassword.php" method="post" autocomplete="off">
	Username: <input type="text" name="iusername" required/><br>
	Contact Number: <input type="tel" name="icontact" required/><br>
	<div class="g-recaptcha" data-sitekey="6LdKP0QUAAAAACpbeKvHRWCdWq3PDKOyB4Qi2-IM"></div>
	<input type="submit" name ="lost" value="Submit" /><br>
	</form>
	<form action="customerhome.php" method="post" />
	<input type="submit" name="customerhome.php" value="Back to Main page" />
	</form>
	
</body>	
<script src='https://www.google.com/recaptcha/api.js'></script>
</html>
