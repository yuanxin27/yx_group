<html>
<body>
<?php

$db = mysqli_connect("localhost", "root", "", "cinemax movies"); //connect to database
if (!$db){
	die('Could not connect: ' . mysqli_connect_errno()); //return error is connect fail
}

if (isset($_POST['update_lost']))
{
	session_start();
	$ipwd = $_POST['ipwd'];
	$ipwd2 = $_POST['ipwd2'];
	$error = "q";
	$contact = $_SESSION['icontact'];
	$username = $_SESSION['iusername'];
	$sql = "SELECT * FROM customer WHERE Customer_Username='$username' AND Customer_Contact_No='$contact'";
	$result = mysqli_query($db, $sql);
	if (mysqli_num_rows($result) == 1) 
	{
		$mysql_get_users = mysqli_query($db, "SELECT * FROM customer WHERE Customer_Username='$username' AND Customer_Contact_No='$contact'");
		$get_rows = mysqli_num_rows($mysql_get_users);
			
		if( strlen($ipwd) > 20 ) 
		{
			$error = "Password too long!";
			if($error == "Password too long!")
			{
				echo "Password validation failure(your choice is weak): $error";
				echo '<form action="customerbeforeupdatelostpassword.php" method="post">';
				echo '<input type="submit" value="Click here to go back." />';
				echo '</form>';
			}
		}
		else if( strlen($ipwd) < 8 ) 
		{
			$error = "Password too short!";
			if($error == "Password too short!")
			{
				echo "Password validation failure(your choice is weak): $error";
				echo '<form action="customerbeforeupdatelostpassword.php" method="post">';
				echo '<input type="submit" value="Click here to go back." />';
				echo '</form>';
			} 
		}
		else if  (!preg_match("$\S*(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])\S*$", $ipwd))
		{
			echo "Password length must be at least 8 and password must contain at least one lowercase letter and at least one uppercase letter and at least one number and at least a special character";
			echo '<form action="customerbeforeupdate.php" method="post">';
			echo '<input type="submit" value="Click here to go back." />';
			echo '</form>';
			
		}
		else if ( $ipwd == $ipwd2 )
		{	
			echo "Your password is strong.";
			$hash = password_hash($ipwd, PASSWORD_BCRYPT, ['cost' => 11]);
			$sql1 = "UPDATE customer SET Customer_Password ='$hash' WHERE Customer_Contact_No='$contact' AND Customer_Username='$username'";
			$sql2 = "INSERT INTO log (event_id, username) VALUES (26, '$username')";
			mysqli_query($db, $sql1);
			mysqli_query($db, $sql2);
			echo "Password update complete";
			unset($_SESSION['iusername']);
			echo '<form action="customerhome.php" method="post" >';
			echo '<input type="submit" value="Back to main page" />';
			echo '</form>';
		}
		else
		{
			echo "Password failed";
			echo '<form action="customerbeforeupdatelostpassword.php" method="post" >';
			echo '<input type="submit" value="Back to previous page" />';
			echo '</form>';
		}
	}
	else
	{
		header ("location: customerbeforeupdatelostpassword.php");
	}	
			
}
else
{
	echo "Failed";
	echo '<form action="customerbeforelogin.php" method="post" >';
	echo '<input type="submit" value="Back to Login page" />';
	echo '</form>';
}


?>
</body>
</html>
