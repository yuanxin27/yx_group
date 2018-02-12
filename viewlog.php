<html>
<body>
<h1><b><center>VIEW LOGS</center></b></h1>
<?php
$db = mysqli_connect("localhost","root","","cinemax movies"); //connect to database
if (!$db){
	die('Could not connect: ' . mysqli_connect_errno()); //return error is connect fail
}

if (isset($_POST['viewlogButton'])) 
{
	session_start();
	$username = $_SESSION['username'];
	$sql2 = "SELECT * FROM log";
	$result = mysqli_query($db, $sql2);
	if (mysqli_num_rows($result) > 0) 
	{
		mysqli_query($db, "INSERT INTO log (event_id, username) VALUES (6, '$username')");
		echo "<table border = \"1\"><tr><th>Log ID</th><th>Event ID</th><th>Date</th><th>Username</th><th>User Affected/Created</th></tr>";
		while($row = mysqli_fetch_assoc($result)) 
		{
			echo '<tr><td align="center">' . $row["log_id"]. '</td><td align="center">' . $row["event_id"]. '</td><td align="center">' . $row["date"]. '</td><td align="center">' . $row["username"]. '</td><td align="center">' . $row["target_user"] . "</td></tr>";
		}
		echo "</table>";
		echo '<br>';
		$sql3 = "SELECT * FROM log_event";
		$result2 = mysqli_query($db, $sql3);
		echo "<b>LEGEND:</b>";
		echo '<br>';
		echo '<br>';
		echo "<table border = \"1\"><tr><th>Event ID</th><th>Event Details</th></tr>";
		while($row2 = mysqli_fetch_assoc($result2))
		{
			echo '<tr><td align="center">' . $row2["event_id"]. '</td><td align="center">' . $row2["event_details"]. '</td></tr>';
		}
		echo "</table>";
		echo '<br>';
		echo '<br>';
		echo '<br>';
		echo '<form action="createlog.php" method="post">';
		echo '<input type="submit" name="createlogButton" value="Create Remark..." />';
		echo '</form>';
		echo '<form action="viewremarks.php" method="post">';
		echo '<input type="submit" name="viewremarksButton" value="View Remarks..." />';
		echo '</form>';
		echo '<form action="deletelog.php" method="post">';
		echo '<input type="submit" name="deleteremarksButton" value="Delete Remarks..." />';
		echo '</form>';
		echo '<form action="editlog.php" method="post">';
		echo '<input type="submit" name="editremarksButton" value="Edit Remarks..." />';
		echo '</form>';
		echo '<br>';
		echo '<form action="audit_home.php" method="post">';
		echo '<input type="submit" value="Back" />';
		echo '</form>';
	}
	else
	{
		echo "No Audit Logs.";
		echo '<form action="audit_home.php" method="post">';
		echo '<input type="submit" value="Back" />';
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
