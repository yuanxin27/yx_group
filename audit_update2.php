<?php
session_start();
$db = mysqli_connect("localhost","root","","cinemax movies"); //connect to database
if (!$db){
	die('Could not connect: ' . mysqli_connect_errno()); //return error is connect fail
}

if(isset($_SESSION['hash4']))
{
	echo '<h1> Update User Information </h1>

		<form action="auditupdatename.php" method="post" >
		<input type="submit" name="customerupdatename.php" value="Change Name" />
		</form><br>
		
		<form action="auditupdatecontact.php" method="post" >
		<input type="submit" name="customerupdatecontact.php" value="Change Contact No" />
		</form><br>
		
		<form action="auditupdateaddress.php" method="post" >
		<input type="submit" name="customerupdatename.php" value="Change Address" />
		</form><br>
		
		<form action="adhome.php" method="post" >
		<input type="submit" name="customerhomeafterloginregister.php" value="Back to home page" />
		</form><br>
		
	</body>
	</html>';
	
}
else
{
	header('Location: adhome.php');
}

	
	
	