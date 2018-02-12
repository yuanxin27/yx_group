<html>
<body>
<b><center>DELETE LOGS</center></b>
<?php
$db = mysqli_connect("localhost","root","","cinemax movies"); //connect to database
if (!$db){
	die('Could not connect: ' . mysqli_connect_errno()); //return error is connect fail
}
session_start();
if (isset($_SESSION['username']))
{
	$username = $_SESSION['username'];
	$sql = mysqli_query($db, "SELECT auditor_id from auditor where username='$username'");
	$row = mysqli_fetch_assoc($sql);
	$auditorid2 = $row["auditor_id"];
	if (isset($_POST['deletelogButton2'])) 
	{
		$remarkid = $_POST['remarkid'];
		$sql5 = mysqli_query($db, "SELECT remark_id from log_remarks where remark_id = '$remarkid'");
		if(mysqli_num_rows($sql5) == 1)
		{
		$sql2 = mysqli_query($db, "SELECT auditor_id from log_remarks where remark_id='$remarkid'");
		$row2 = mysqli_fetch_assoc($sql2);
		$auditorid3 = $row2["auditor_id"];
		
			if ($auditorid2 == $auditorid3) 
			{	
				$sql3 = "DELETE FROM log_remarks WHERE remark_id = '$remarkid' AND auditor_id = '$auditorid2'";
				mysqli_query($db, $sql3);
				mysqli_query($db, "INSERT into log (event_id, username) VALUES (5, '$username')");
				echo "Remark Successfully Deleted.";
				echo '<form action="audit_home.php" method="post">';
				echo '<input type="submit" name="homeButton" value="Back to Home Page" />';
				echo '</form>';
			}
			else
			{
				echo "ERROR: Remark does not exist, or you are trying to delete other remarks that you did not create.";
				echo '<form action="audit_home.php" method="post">';
				echo '<input type="submit" name="homeButton" value="Back to Home Page" />';
				echo '</form>';
			}
		}
		else
		{
			echo "ERROR: Remark does not exist, or you are trying to delete other remarks that you did not create.";
			echo '<form action="audit_home.php" method="post">';
			echo '<input type="submit" name="homeButton" value="Back to Home Page" />';
			echo '</form>';
		}
	}
	else if (isset($_POST['deletelogButton3'])) 
	{
		$sql4 = mysqli_query($db, "SELECT * FROM log_remarks WHERE auditor_id = '$auditorid2'");
		$num = mysqli_num_rows($sql4);
		for($i = 0; $i < $num; $i++)
		{
			mysqli_query($db, "INSERT into log (event_id, username) VALUES (5, '$username')");
		}
		$sql6 = "DELETE FROM log_remarks WHERE auditor_id = '$auditorid2'";
		mysqli_query($db, $sql6);
		echo "All remarks successfully deleted.";
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
