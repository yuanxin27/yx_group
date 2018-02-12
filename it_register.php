<?php
$db = mysqli_connect("localhost","root","","cinemax movies"); //connect to database
if (!$db){
	die('Could not connect: ' . mysqli_connect_errno()); //return error is connect fail
}

if(isset ($_POST['register_btn1'])) 
{
	session_start();
	$name = $_POST['name'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$contact= $_POST['contact'];
	$itpass= $_POST['itpass'];
	$address= $_POST['address'];
	$itpass2= $_POST['itpass2'];
	$adminid = $_SESSION['Admin_ID'];
	
	if ($itpass == $itpass2)
	{
	     //create use

		$error = "q";
		$num_length = strlen((string)$contact);
		if(isset($adminid))
		{
			$mysql_get_users = mysqli_query($db, "SELECT * FROM `it personal` where Username='$username'");
			$get_rows = mysqli_num_rows($mysql_get_users);

			if($get_rows == 1)
			{
				// if username exists
				echo "user exists";
				echo '<form action="it_registerinput.php" method="post">';
				echo '<input type="submit" value="Click here to go back." />';
				echo '</form>';
			}
			else
			{
				// if username doesnt exist
				$mysql_get_emails = mysqli_query($db, "SELECT * FROM `it personal` where Email='$email'");
				$get_rows2 = mysqli_num_rows($mysql_get_emails);
				
				if($get_rows2 == 1)
				{
					// if email exists
					echo "The email you entered is already in use.";
					echo '<form action="it_registerinput.php" method="post">';
					echo '<input type="submit" value="Click here to go back." />';
					echo '</form>';
				}
				else 
				{
					// if email doesnt exist
					$mysql_get_contact = mysqli_query($db, "SELECT * FROM `it personal` where contact='$contact'");
					$get_rows3 = mysqli_num_rows($mysql_get_contact);
					
					if($get_rows3 == 1)
					{
						// if contact exists
						echo "The contact number you entered is already in use.";
						echo '<form action="it_registerinput.php" method="post">';
						echo '<input type="submit" value="Click here to go back." />';
						echo '</form>';
					}
					else
					{
						// if contact doesnt exist
						if( strlen($itpass) > 20 ) 
						{
							$error = "Password too long!";
							if($error == "Password too long!")
							{
								echo "Password validation failure(your choice is weak): $error";
								echo '<form action="it_registerinput.php" method="post">';
								echo '<input type="submit" value="Click here to go back." />';
								echo '</form>';
							}
						}
						else if( strlen($itpass) < 8 ) 
						{
							$error = "Password too short!";
							if($error == "Password too short!")
							{
								echo "Password validation failure(your choice is weak): $error";
								echo '<form action="it_registerinput.php" method="post">';
								echo '<input type="submit" value="Click here to go back." />';
								echo '</form>';
							} 
						}
						else if (!preg_match("$\S*(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])\S*$", $itpass))
						{
							echo "Password length must be at least 8 and password must contain at least one lowercase letter and at least one uppercase letter and at least one number and at least a special character";
							echo '<form action="it_registerinput.php" method="post">';
							echo '<input type="submit" value="Click here to go back." />';
							echo '</form>';
						}
						else if ($num_length > 8) 
						{
							$error = "Contact Number incorrect, please input only 8 numbers!";
							if($error == "Contact Number incorrect, please input only 8 numbers!")
							{
								echo "$error";
								echo '<form action="it_registerinput.php" method="post">';
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
								echo '<form action="it_registerinput.php" method="post">';
								echo '<input type="submit" value="Click here to go back." />';
								echo '</form>';
							} 
						}
						else if (!preg_match("/^[a-z0-9_-]{3,16}$/", $username))
						{
							echo "Username should be alphanumeric";
							echo '<form action="it_registerinput.php" method="post">';
							echo '<input type="submit" value="Click here to go back." />';
							echo '</form>';
						}
						else if (!filter_var($email, FILTER_VALIDATE_EMAIL))
						{
							echo "Please enter a valid email";
							echo '<form action="it_registerinput.php" method="post">';
							echo '<input type="submit" value="Click here to go back." />';
							echo '</form>';
						}
						else 
						{	
							$hash = password_hash($itpass, PASSWORD_BCRYPT, ['cost' => 11]);
							$sql3 = "INSERT INTO `it personal`(`Name`, `Username`, `Password`, `Address`, `Email`, `Contact`) VALUES ('$name', '$username','$hash','$address','$email','$contact')";
							$sql2 = "INSERT into `log` (event_id, username, target_user) VALUES (18, '$adminid', '$username')";
							mysqli_query($db, $sql3);
							mysqli_query($db, $sql2);
							header("location: adhome.php");
						}
					}
				}
			}
		}
		else
		{
			header('Location: logininput_data.php');
		}
	}
	else
	{
		$_SESSION['message'] = "The two passwords do not match";
		header('refresh:2; url=it_registerinput.php');
		echo "The passwords do not match please try again";
		
	}
}
else
{
	header('Location: logininput_data.php');
}
	
?>
</body>
</html>