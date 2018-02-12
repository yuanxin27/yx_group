<html>
<body>
<?php
session_start();
if (isset($_POST['editremarksButton'])) 
{
	if(isset($_SESSION['username']))
	{
			echo '<h1> REMARK EDIT</h1>';
			echo '<p> Unauthorised Access is prohibited. </p>';
			echo '<form action="editlog2.php" method="post">';
			echo 'Enter Remark ID to Edit: <input type="text" name="remarkid2" />';
			echo '<input type="submit" name="editlogButton2" value="Proceed" />';
			echo '<br>';
			echo '</form>';
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
