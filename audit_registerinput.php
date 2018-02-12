<?php
session_start();
if(isset($_SESSION['otp1']))
{
	echo'
	<html>
	<body>
	<head>
		<h1>Auditor Registration</h1>
		<form action="audit_register.php" method="post">	
		Username: <input type="text" name="username" />
		Password: <input type ="password" name="auditpass" />
		RePassword: <input type ="password" name="auditpass2"/>
		Name: <input type = "text" name= "name" />
		Address: <input type="text" name="address" />
		Contact: <input type="text" name="contact" />
		Email: <input type="text" name="email" />
		<input type="submit"  value="register" name ="register_btn2"/>
		</form>
	</body>
	</html>';
}
else
{
	header('Location: logininput_data.php');
}
?>