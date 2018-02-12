<!DOCTYPE html>
<html>
<body>
<?php
session_start();
if(isset($_SESSION['hash'])) 
{
echo'<h1> Update User Information </h1>
	<form action="itupdateaddressdata.php" method="post" autcomplete="off">
	Address: <input type="text" name="iaddress"required/>
	<input type="submit" name="update_btnname" value="update" requried/>
	</form>
	</body>
	</html>';
}
else
{
	echo 'failed';
}



