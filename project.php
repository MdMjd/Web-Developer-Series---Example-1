<?php
session_start();
include ('db.php');

?>
<html>
<head>
	<style>
	#container ul {
		list-style:none;

	}

	#container ul li{
		background-color:lightblue;
		width:150px;
		border:5px solid white;
		height:50px;
		line-heghit:50px;
		text-align:center;
		float:left;
		font-size:21px;
			text-decoration:none;
		font-weight:blod;
	}

	#container ul li:hover{
		background-color:#0099FF;

	}
	</style>
<body>

<title>Example Website</title>
<img src="example.png" height="160" width="1350">

<div id="container" >

<ul>
  <li> <a href="project.php"> Home </a>  </li>
	<li><a href="contactNew.php">Contact Us</a> </li>
	<li><a href="dashboard.php"> Dashboard </a></li>
</ul>
</div><br><br>
<br>

 <form action="<?php echo $_SERVER['PHP_SELF'];?>"method="POST">
username:<input type="text" name="uid">
password:<input type="text" name="pwd">
<input type="submit" value="login" name="l">

</form><br><br>

<?php
if(isset($_POST['l'])) {
	$username = $_POST['uid'];
	$password = $_POST['pwd'];

	if(empty($username) and empty($password)) {
		echo "Please fill in all the fields";
		echo "<br>";
	} else {
		//Performs a query against the database
		$query = mysqli_query($con,"SELECT * FROM register WHERE susername='$username' AND spassword='$password'");

		$rows = mysqli_num_rows($query);
		$result = mysqli_fetch_assoc($query);
		//$name = $result['susername'];
		$_SESSION['susername'] = $result['susername'];

		if(!$rows == 1) {
			echo "Incorrect Username and Password";
		}
	}
}

if(isset($_SESSION['susername'])) {
		//do what is done here if logged in or limiters
		echo "Welcome, ".$_SESSION['susername'];
		echo '<br><a href="logout.php">Log Out</a>';
	} else {
		echo "Welcome Guest";
	}
?>
</body>
</head>
</html>
