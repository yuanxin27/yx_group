<?php
	session_start();
	
$db = mysqli_connect("localhost","root","","cinemax movies"); //connect to database
if (!$db){
	die('Could not connect: ' . mysqli_connect_errno()); //return error is connect fail
}

if(isset ($_POST['login_btn'])) 
{
	$adminid = $_POST['adminid'];
	$adminpass= $_POST['adminpass'];

	
	$query = "Select * FROM admin WHERE Admin_ID='$adminid'";
	$result= mysqli_query($db, $query);
	$number = mysqli_num_rows($result);

	
	if ($number == 1)
	{
		// username exists
		$sql = "Select Password FROM admin WHERE Admin_ID='$adminid'";
		$result2 = mysqli_query($db, $sql);
		$result3 = mysqli_fetch_assoc($result2);	
		if (password_verify($adminpass, $result3['Password'])) 
		{
			$bottomValue= 60*8;
			$upperValue = 60*23;
			$currentValue = date("H")*60 + date("i") + 420;
			if (($currentValue >= $bottomValue) && ($currentValue <= $upperValue))
			{
				// username and password correct, correct timing.

				$_SESSION['Admin_ID'] = $adminid;
				echo "Password is correct";
				header('location: otpform.php');
			}
			else
			{
				mysqli_query($db , "INSERT INTO log (event_id, username) VALUES (24, '$adminid')");
				header('Location: logininput_data.php');
			}
		}
		else
		{
			mysqli_query($db , "INSERT INTO log (event_id, username) VALUES (24, '$adminid')");
			header('Location: logininput_data.php');
		}
	}
	else
	{	
		//username doesnt exist
		header('refresh:1; url=logininput_data.php');
		echo "Username does not exist";
	}
}
else
{
	header('location: logininput_data.php');
}

?>
</body>
</html>