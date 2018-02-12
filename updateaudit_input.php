
<?php
	
$db = mysqli_connect("localhost","root","","cinemax movies"); //connect to database
if (!$db){
	die('Could not connect: ' . mysqli_connect_errno()); //return error is connect fail
}

?>
<h1> UPDATE AUDITOR PARTICULARS </h1>
	

<table border=1 cellpadding=1 cellspacing=1>
	<tr>
		<th>Username</th>
		<th>Address</th>
		<th>Password</th>
		<th>Contact </th>
		<th>Email </th>
		<th>Name </th>
	</tr>

<?php
if(!isset($_SERVER['HTTP_REFERER']))
{
	header("location: logininput_data.php");
	
}
else
{
	$sql ="SELECT * FROM auditor";
	$mydata = mysqli_query($db, $sql);
	
	while($row = mysqli_fetch_array($mydata))
	{
		echo "<tr>";
		echo "<td>".$row['username']."</td>";
		echo "<td>".$row['address']."</td>";
		echo "<td>".$row['password']."</td>";
		echo "<td>".$row['contact']."</td>";
		echo "<td>".$row['email']."</td>";
		echo "<td>".$row['auditor_name']."</td>";
		echo "<td><a href=updateaudit.php?username=".$row['username'].">Update</a></td>";
	}
}
?>	
	
<form action="button.php" method="post">
<input type='submit' name='home_btn' value='Home page' />
</form>
	
</body>
</html>