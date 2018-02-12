<!DOCTYPE html>
<html>
<body>
<?php
session_start();
if(isset($_SESSION['iusername'])) 
{
	echo'<h1> Update User Information </h1>
	<form action="customerupdatecontactdata.php" method="post" autcomplete="off">
	Contact Number: <input type="tel" name="icontact"/>
	<input type="submit" name="update_btncontact" value="update" requried/>
	</form>
	</body>
	</html>';
}
else
{
	echo 'failed';
}