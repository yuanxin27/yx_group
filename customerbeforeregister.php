<!DOCTYPE html>

<html>
<body>


<h1> Welcome to Cinemax Movies, please register</h1>
	<h2> Username and Email can only be set once! </h2>
	
		<form action="customerregister.php" method="post" autocomplete="off">
		Name: <input type="text" name="iname" required/><br>
		Username: <input type="text" name="iusername" required/><br>
		Contact Number: <input type="tel" name="icontact" required/><br>
		Email: <input type="Email" name="iemail" required/><br>
		Password: <input type="password" name="ipwd" required/><br>
		Re-type Password: <input type="password" name="ipwd2" required/>
		<input type="submit" name="register_btn" value="Register" />
		</form>
		
	<form action="customerhome.php" method="post" />
	<input type="submit" name="customerhome.php" value="Back to Main page" />
	</form>


</body>	

</html>


