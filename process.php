 <?php
session_start();
$db = mysqli_connect("localhost", "root", "", "cinemax movies"); //connect to database
if (!$db)
{
	die('Could not connect: ' . mysqli_connect_errno()); //return error is connect fail
}
?>

 <?php

$rndno=rand(100000, 999999);//OTP generate
$message = urlencode("otp number.".$rndno);
$to=$_SESSION['iemail'];
$subject = "OTP";
$txt = "OTP: ".$rndno."";
$headers = "From: 1604392I@gmail.com" . "\r\n" .
"CC: 1604392I@gmail.com";
mail($to,$subject,$txt,$headers);
if(isset($_POST['btn-save']))
{
	$_SESSION['otp']=$rndno;
	header( "Location: otp.php" );
} 
?> 