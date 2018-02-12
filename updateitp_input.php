</head>
<h1> UPDATE IT PERSONNEL PARTICULARS </h1>
<body>
<table border=1 cellpadding=1 cellspacing=1>
	<tr>
		<th>Username</th>
		<th>Address</th>
		<th>Password</th>
		<th>Contact </th>
		<th>Email </th>
		<th>Name </th>
		<th>Update</th>
	</tr>
	
<?php
	$db = mysqli_connect("localhost","root","","cinemax movies"); //connect to database
	if (!$db){
		die('Could not connect: ' . mysqli_connect_errno()); //return error is connect fail
	}
	
	if(!isset($_SERVER['HTTP_REFERER']))
{
	header("location: logininput_data.php");
	
}

else
{
session_start();
$sql ="SELECT * FROM `it personal`";

$mydata = mysqli_query($db, $sql);

while($row = mysqli_fetch_assoc($mydata))
	{
		echo "<tr>";
		echo "<td>".$row['Username']."</td>";
		echo "<td>".$row['Address']."</td>";
		echo "<td>".$row['Password']."</td>";
		echo "<td>".$row['Contact']."</td>";
		echo "<td>".$row['Email']."</td>";
		echo "<td>".$row['Name']."</td>";
		echo "<td><a href=updateitp.php?Username=".$row['Username'].">Update</a></td>";
	
	}

}

?>

<form action="button.php" method="post">
<input type='submit' name='home_btn' value='Home page' />
</form>

</table>
</body>
</html>