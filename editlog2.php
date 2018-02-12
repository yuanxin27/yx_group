<html>
<body>
<?php

$db = mysqli_connect("localhost", "root", "", "cinemax movies"); //connect to database
if (!$db){
    die('Could not connect: ' . mysqli_connect_errno()); //return error is connect fail
}
if (isset($_POST['editlogButton2'])) 
{
	session_start();
	$remarkid2 = $_POST['remarkid2'];
	$username = $_SESSION['username'];
	$sql = mysqli_query($db, "SELECT auditor_id from log_remarks where remark_id='$remarkid2'");
	$row = mysqli_fetch_assoc($sql);
	$auditorid2 = $row["auditor_id"];
	
	$sql2 = mysqli_query($db, "SELECT auditor_id from auditor where username='$username'");
	$row2 = mysqli_fetch_assoc($sql2);
	$auditorid3 = $row2["auditor_id"];

	if ($auditorid2 == $auditorid3) 
	{	
		$_SESSION['remarkID'] = $remarkid2;
		echo '<form action="editlog3.php" method="post">';
		echo 'Enter New Remark: <input type="text" name="nremarks" />';
		echo '<input type="submit" name="editlogButton3" value="Save Changes" />';
	}	
	else
	{
		echo "ERROR: Log does not exist, or you are trying to edit other logs that you did not create.";
		echo '<form action="audit_home.php" method="post">';
		echo '<input type="submit" name="homeButton" value="Back to Home Page" />';
		echo '</form>';
	}

}
else
{
	header('Location: audit_login.php');
}
?>
</body>
</html>