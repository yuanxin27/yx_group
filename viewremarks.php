<html>
<body>
<b><center>VIEW REMARKS</center></b>
<?php
$db = mysqli_connect("localhost","root","","cinemax movies"); //connect to database
if (!$db){
	die('Could not connect: ' . mysqli_connect_errno()); //return error is connect fail
}

if (isset($_POST['viewremarksButton'])) 
{
	session_start();
	$username = $_SESSION['username'];
	$sql2 = "SELECT * FROM log_remarks";
	$result = mysqli_query($db, $sql2);
	if (mysqli_num_rows($result) > 0) 
	{
		mysqli_query($db, "INSERT INTO log (event_id, username) VALUES (7, '$username')");
		while($row = mysqli_fetch_assoc($result)) 
		{
			echo "Remark ID: " . $row["remark_id"]. " | Log ID: " . $row["log_id"]. " | Auditor ID: " . $row["auditor_id"]. " | Date: " . $row["date"]. " | Remarks: " . $row["remark_details"]. "<br>";
		}
		echo '<form action="audit_home.php" method="post">';
		echo '<input type="submit" value="Back" />';
		echo '</form>';
	}
	else
	{
		echo "No Remarks.";
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
