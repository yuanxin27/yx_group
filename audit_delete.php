</head>
<h1> Update Auditor Account </h1>
</head>
<?php
session_start();
$db = mysqli_connect("localhost","root","","cinemax movies"); //connect to database
if (!$db){
	die('Could not connect: ' . mysqli_connect_errno()); //return error is connect fail
}

if(isset($_SESSION['hash9']))
{
	$hash3 = $_SESSION['hash9'];
	$username3 = $_SESSION['duser9'];
	$sql ="DELETE FROM `auditor` WHERE Password = '$hash3' AND Username = '$username3'";
	$mydata = mysqli_query($db, $sql);
	$adminid = $_SESSION['Admin_ID'];
	$sql2 = "INSERT into `log` (event_id, username, target_user) VALUES (21, '$adminid', '$username3')";
	mysqli_query($db, $sql2);
	unset($_SESSION['hash9']);
	unset($_SESSION['duser9']);
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
?>
	
	
	