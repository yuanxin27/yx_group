<!DOCTYPE html>
<html>
<body>
<?php
session_start();
if(isset($_SESSION['Admin_ID'])) 
{
echo'<h1> Update User Information </h1>
	<form action="itupdatecontactdata.php" method="post" autcomplete="off">
	Contact No: <input type="tel" name="icontact"required/>
	<input type="submit" name="update_btnname" value="update" requried/>
	</form>
	</body>
	</html>';
}
else
{
	echo 'failed';
}



