<head>
<h1> Delete IT Personnel Account </h1>
</head>
<?php
session_start();
$db = mysqli_connect("localhost","root","","cinemax movies"); //connect to database
if (!$db){
	die('Could not connect: ' . mysqli_connect_errno()); //return error is connect fail
}

if(isset($_SESSION['hash2']))
{
	$hash3 = $_SESSION['hash2'];
	$username3 = $_SESSION['duser2'];
	$sql ="DELETE FROM `it personal` WHERE Password = '$hash3' AND Username = '$username3'";
	$mydata = mysqli_query($db, $sql);
	$adminid = $_SESSION['Admin_ID'];
	$sql2 = "INSERT into `log` (event_id, username, target_user) VALUES (20, '$adminid', '$username3')";
	mysqli_query($db, $sql2);
	unset($_SESSION['hash2']);
	unset($_SESSION['duser2']);
	echo "Delete successful.";
	echo "<br>";
	echo "<br>";
	echo 
	"<form action='button.php' method='post'>
	<input type='submit' name='home_btn' value='Home page' />
	</form>";
	
}
else
{
	header('Location: adhome.php');
}

	
	
	