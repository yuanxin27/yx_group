<html>
<body>
<?php
session_start();
if(isset($_SESSION['username']))
{
	echo '<h1> LOG DELETE PAGE </h1>';
	echo '<p> CAUTION: DELETING AUDIT LOG REMARKS ARE PERMANENT! THIS CANNOT BE UNDONE. </p>';
	echo '<form action="deletelog2.php" method="post">';
	echo 'Enter Remark ID to be Deleted: <input type="text" name="remarkid" />';
	echo '<input type="submit" name="deletelogButton2" value="Delete Remark" />';
	echo '<p></p>';
	echo '<form action="deletelog2.php" method="post">';
	echo '<input type="submit" name="deletelogButton3" value="Delete All Remarks" />';
	echo '</form>';
	echo '<br>';
	echo '<form action="audit_home.php" method="post">';
	echo '<input type="submit" value="Back" />';
	echo '</form>';
}
else
{
	header("location: audit_login.php");
}
	
?>
</body>
</html>	
