<html>
<body>
<?php

$db = mysqli_connect("localhost", "root", "", "cinemax movies"); //connect to database
if (!$db){
    die('Could not connect: ' . mysqli_connect_errno()); //return error is connect fail
}
if (isset($_POST['createlogButton'])) 
{
	session_start();
	echo '<form action="createlog2.php" method="post">';
	echo 'Log ID: <input type="text" name="logid" />';
	echo 'Log Remark: <input type="text" name="logremarks" />';
	echo '<input type="submit" name="createlogButton2" value="Submit" />';
	echo '</form>';
	echo '<br>';
	echo '<form action="audit_home.php" method="post">';
	echo '<input type="submit" value="Back" />';
	echo '</form>';
}
else
{
    header('Location: audit_login.php');
}
?>
</body>
</html>