<!DOCTYPE html>
<html>
<head>
<style>

h1 {
    font-family: "Roboto", sans-serif;
    color: violet;
    font-size: 40px;
    text-align: center;
}

p {
    font-family: "Roboto", sans-serif;
    font-size: 20px;
    color: aqua;
    text-align: center;
}
.dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown:hover .dropbtn {
    background-color: #3e8e41;
}
.navbar {
  overflow: hidden;
  background-color: #320707;
  position: fixed;
  top: 0;
  width: 100%;
}

.navbar a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
  
}

.button {
  display: block;
  margin: 0 auto;
  padding: 5px 10px;
  font-size: 24px;
  font-family: "Montserrat", sans-serif;
  text-align: center;
  cursor: pointer;
  outline: none;
  color: #fff;
  background-color: #591AE0;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999;
}
.button:hover {background-color: #4A116C}

.button:active {
  background-color: 591AE0;
  box-shadow: 0 5px #000;
  transform: translateY(4px);
}

.main {
  padding: 16px;
  margin-top: 30px;
  height: 1500px; /* Used in this example to enable scrolling */
  background-color: #7C7F83;
  background: #7C7F83 -webkit-gradient(linear, left top, left bottom, from(#080C10), to(#7C7F83)) no-repeat;
  
}
{
    width:100%;
    text-align: center;
}
.inner
{
    display: inline-block;
    float: right;
   
}


</style>
</head>

<body>
<?php 
session_start();
if (isset($_SESSION['iusername']))
{
	echo '<div class="navbar">
	<a href="#home">Home</a>
	<a href="showtimes">Show Times</a>
	<a href="#movies">Movies</a>
	<a href="#cinemalocations">Cinema Locations</a>
	<a href="#promotions">Promotions</a></li>
	<div id="outer">
	<form action="customerlogout.php" method="post">
	<div class="inner"><button class="button">Logout</button></div>
	</form>
	</div>
	</div>
	</div>

	<div class="main">
	<h1>Welcome to Cinemax Movies</h1>
	<h2><font color="teal"> Welcome user</font></h2>

	<form action="customerbeforeupdate.php" method="post">
	<div class="inner"><button class="button">Edit Account</button></div>
	</form>
	<form action="customerbeforeviewaccountinfo.php" method="post">
	<div class="inner"><button class="button">View Account</button></div>
	</form>
		  
	<body bgcolor="#FEFDFD">


	<div class="dropdown">
	<button class="dropbtn">Movies</button>
	<div class="dropdown-content">
	<a href="customermoviechosen.php">Dr Strange - $10.00</a>	
	</div>
	</div>';
	
}
else
{
	header('Location:customerhome.php');
}
?>
</body>
</html>
