<?php
session_start();
if(isset($_SESSION['otp1']))
{
	echo'
	<html>
	<body>
	<head>
		<h1>IT personnel Registration</h1>
		<form action="it_register.php" method="post">	
		Username: <input type="text" name="username" />
		Password: <input type ="password" name="itpass" />
		RePassword: <input type ="password" name="itpass2"/>
		Name: <input type = "text" name= "name" />
		Address: <input type="text" name="address" />
		Contact: <input type="text" name="contact" />
		Email: <input type="text" name="email" />
		<input type="submit"  value="register" name ="register_btn1"/>
		</form>
	</body>
	</html>';
	echo 
	"<form action='button.php' method='post'>
	<input type='submit' name='home_btn' value='Home page' />
	</form>";
}
else
{
	header('Location: logininput_data.php');
}
?>