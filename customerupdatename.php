<!DOCTYPE html>
<html>
<body>
<?php
session_start();
if(isset($_SESSION['iusername'])) 
{
echo'<h1> Update User Information </h1>
	<form action="customerupdatenamedata.php" method="post" autcomplete="off">
	Name: <input type="text" name="iname"required/>
	<input type="submit" name="update_btnname" value="update" requried/>
	</form>
	</body>
	</html>';
}
else
{
	echo 'failed';
}



