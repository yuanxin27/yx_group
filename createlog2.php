<html>
<body>
<?php
$db = mysqli_connect("localhost", "root", "", "cinemax movies"); //connect to database
if (!$db){
    die('Could not connect: ' . mysqli_connect_errno()); //return error is connect fail
}
if (isset($_POST['createlogButton2'])) 
{
	session_start();
	if(isset($_SESSION['username']))
	{
		$username = $_SESSION['username'];
		$sql = mysqli_query($db, "SELECT auditor_id from auditor where username='$username'");
		$row = mysqli_fetch_assoc($sql);
		$auditorid2 = $row["auditor_id"];
		
		$logid = $_POST['logid'];
		$logremarks = $_POST['logremarks'];
		$sql2 = mysqli_query($db, "SELECT * FROM log where log_id = '$logid'");
		if(mysqli_num_rows($sql2) == 1)
		{
			$sql3 = "INSERT INTO log_remarks (log_id, auditor_id, remark_details) VALUES ('$logid', '$auditorid2', '$logremarks')";
			mysqli_query($db, $sql3);
			mysqli_query($db, "INSERT INTO log (event_id, username) VALUES (3, '$username')");
			echo "Remark Successfully Created.";
			echo '<form action="audit_home.php" method="post">';
			echo '<input type="submit" name="homeButton" value="Back to Home Page" />';
			echo '</form>';
		}
		else
		{
			echo "Log does not exist!";
			echo '<form action="audit_home.php" method="post">';
			echo '<input type="submit" name="homeButton" value="Back to Home Page" />';
			echo '</form>';
		}
	}
}
else
{
	header('Location: audit_login.php');
}

?>
</body>
</html>