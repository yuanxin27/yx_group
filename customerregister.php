<html>
	<h1> registering.... </h1>
<body>
<?php
session_start();
$db = mysqli_connect("localhost", "root", "", "cinemax movies"); //connect to database
if (!$db)
{
	die('Could not connect: ' . mysqli_connect_errno()); //return error is connect fail
}



if (isset($_POST['register_btn']))
{
	$iname = $_POST['iname'];
	$iusername = $_POST['iusername'];
	$icontact = $_POST['icontact'];
	$ipwd = $_POST['ipwd'];
	$ipwd2 = $_POST['ipwd2'];
	$iemail = $_POST['iemail'];
	$error = "q";
	$num_length = strlen((string)$icontact);
	if(isset($iusername))
	{
		$mysql_get_users = mysqli_query($db, "SELECT * FROM customer where Customer_Username='$iusername'");
		$get_rows = mysqli_num_rows($mysql_get_users);

		if($get_rows == 1)
		{
			echo "user exists";
			echo '<form action="customerbeforeregister.php" method="post">';
			echo '<input type="submit" value="Click here to go back." />';
			echo '</form>';
		}
		else
		{
			$mysql_get_emails = mysqli_query($db, "SELECT * FROM customer where Customer_Email='$iemail'");
			$get_rows2 = mysqli_num_rows($mysql_get_emails);
			if($get_rows2 == 1)
			{
				echo "The email you entered is already in use.";
				echo '<form action="customerbeforeregister.php" method="post">';
				echo '<input type="submit" value="Click here to go back." />';
				echo '</form>';
			}
			else 
			{
				$mysql_get_contact = mysqli_query($db, "SELECT * FROM customer where Customer_Contact_No='$icontact'");
				$get_rows3 = mysqli_num_rows($mysql_get_contact);
				if($get_rows3 == 1)
				{
				
					echo "The contact number you entered is already in use.";
					echo '<form action="customerbeforeregister.php" method="post">';
					echo '<input type="submit" value="Click here to go back." />';
					echo '</form>';
				}
				else
				{
					if( strlen($ipwd) > 20 ) 
					{
						$error = "Password too long!";
						if($error == "Password too long!")
						{
							echo "Password validation failure(your choice is weak): $error";
							echo '<form action="customerbeforeregister.php" method="post">';
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
							echo '<form action="customerbeforeregister.php" method="post">';
							echo '<input type="submit" value="Click here to go back." />';
							echo '</form>';
						} 
					}
					else if (!preg_match("$\S*(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])\S*$", $ipwd))
					{
						echo "Password length must be at least 8 and password must contain at least one lowercase letter and at least one uppercase letter and at least one number and at least a special character";
						echo '<form action="customerbeforeregister.php" method="post">';
						echo '<input type="submit" value="Click here to go back." />';
						echo '</form>';
					}
					else if ($num_length > 8) 
					{
						$error = "Contact Number incorrect, please input only 8 numbers!";
						if($error == "Contact Number incorrect, please input only 8 numbers!")
						{
							echo "$error";
							echo '<form action="customerbeforeregister.php" method="post">';
							echo '<input type="submit" value="Click here to go back." />';
							echo '</form>';
						} 
					}
					else if ($num_length < 8)
					{
						$error = "Contact Number incorrect, please input only 8 numbers!";
						if($error == "Contact Number incorrect, please input only 8 numbers!")
						{
							echo "$error";
							echo '<form action="customerbeforeregister.php" method="post">';
							echo '<input type="submit" value="Click here to go back." />';
							echo '</form>';
						} 
					}
					else if (!preg_match("/^[a-z0-9_-]{3,16}$/", $iusername))
					{
						echo "Username should be alphanumeric";
						echo '<form action="customerbeforeregister.php" method="post">';
						echo '<input type="submit" value="Click here to go back." />';
						echo '</form>';
					}
					else if (!filter_var($iemail, FILTER_VALIDATE_EMAIL))
					{
						echo "Please enter a valid email";
						echo '<form action="customerbeforeregister.php" method="post">';
						echo '<input type="submit" value="Click here to go back." />';
						echo '</form>';
					}
					
					else if ( $ipwd == $ipwd2 )
					{	
						$_SESSION['iusername'] = $iusername;
						$_SESSION['iemail'] = $iemail;
						$hash = password_hash($ipwd, PASSWORD_BCRYPT, ['cost' => 11]);
						$_SESSION['ihash'] = $hash;
						$_SESSION['icontact'] = $icontact;
						$_SESSION['iname'] = $iname;
						header ('location: otpform.php');
					}
					else
					{
						echo "Password failed";
						echo '<form action="customerbeforeupdatelostpassword.php" method="post" >';
						echo '<input type="submit" value="Back to previous page" />';
						echo '</form>';
					}
						
				}
			}
		}
	}
		
}
else 
{
	echo "Failed to Register";
}
?>
</body>
</html>

