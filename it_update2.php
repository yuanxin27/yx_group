<?php
session_start();
$db = mysqli_connect("localhost","root","","cinemax movies"); //connect to database
if (!$db){
	die('Could not connect: ' . mysqli_connect_errno()); //return error is connect fail
}

if(isset($_SESSION['hash']))
{
	echo '<h1> Update User Information </h1>

	<form action="itupdatename.php" method="post" >
	<input type="submit" name="customerupdatename.php" value="Change Name" />
	</form><br>
	
	<form action="itupdatecontact.php" method="post" >
	<input type="submit" name="customerupdatecontact.php" value="Change Contact No" />
	</form><br>
	
	<form action="itupdateaddress.php" method="post" >
	<input type="submit" name="customerupdatename.php" value="Change Address" />
	</form><br>
	
	<form action="adhome.php" method="post" >
	<input type="submit" name="customerhomeafterloginregister.php" value="Back to home page" />
	</form><br>
		
	</body>
	</html>';
	
}

	
	
	