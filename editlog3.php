<html>
<body>
<?php

$db = mysqli_connect("localhost", "root", "", "cinemax movies"); //connect to database
if (!$db){
    die('Could not connect: ' . mysqli_connect_errno()); //return error is connect fail
}
if (isset($_POST['editlogButton3'])) 
{
	session_start();
	$username = $_SESSION['username'];
	$nremarks = $_POST['nremarks'];
	$remarkid3 = $_SESSION['remarkID'];
	
	$sql = "UPDATE log_remarks SET remark_details='$nremarks' WHERE remark_id='$remarkid3'";
	mysqli_query($db, "INSERT INTO log (event_id, username) VALUES (4, '$username')");
	mysqli_query($db, $sql);
	echo "Edit Successful.";
	echo '<form action="audit_home.php" method="post">';
	echo '<input type="submit" name="homeButton" value="Back to Home Page" />';
	echo '</form>';
}
else
{
	header('Location: audit_login.php');
}
?>
</body>
</html>