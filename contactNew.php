<?php
include('db.php');
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

 p.w{

	 font-size:27px;
 }

 p.a{

	 font-size:20px;
 }
</style>


<body>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">

<title>Example Website</title>
<img src="example.png" height="160" width="1350">

<div id="container" >

<ul>
	<li> <a href="project.php"> Home </a>  </li>
	<li><a href="contactNew.php">Contact Us</a> </li>
	<li><a href="dashboard.php"> Dashboard </a></li>
</ul>

</div>
<br><br>
 <center>
 </form>
 <h1><i>Contact us</i></h1>

<p>We are here to answer any questions you may have about this us</p><p>
 Reach out to us and we'll respond as soon as possible.</p>


 <h4>Email</h4><p>example@gmail.com<p>

	<h4>Phone Number</h4><p>968 98038242</p>

	<h4>Address</h4><p>Singapore, Singapore</p>


<fieldset style="width:30%">
<form id="contact_form" action="#" method="POST" enctype="multipart/form-data">
	<div >
		<label for="name">Your name:</label>
		<input id="name" class="input" name="u" type="text"  size="30"/>
	</div><br>
	<div class="row">
		<label for="email">Your email:</label>
		<input id="email" class="input" name="e" type="text"  size="30" />
	</div><br>
	<div class="row">
		<label for="phone number">phone-NO:</label>
		<input id="phone" class="input" name="n" type="text"  size="30" />
	</div><br>
		<div class="row">
		<label for="massege">your Message:</label>
		<textarea id="massege" class="input" name="m" type="text" size="30" /></textarea><br />
	</div><br>
	<input id="submit" class="input" name="s" type="submit" value="Send">
	<div >
	</table>

	</fieldset>

	</center>

	<?php

	if(isset($_POST['s'])) {
		$username = $_POST['u'];
		$email = $_POST['e'];
		$phone = $_POST['n'];
		$message = $_POST['m'];
		$insert = "INSERT INTO contact(cname,cemail,cphone,cmessage) values ('$username','$email','$phone','$message')";


	if(!is_numeric($phone)){

		$message = "Please enter a valid phone number";
		echo "<script type='text/javascript'>alert('$message');</script>";

	}

	elseif (empty($username)){

		$message = "Username is empty";
		echo "<script type='text/javascript'>alert('$message');</script>";
	}
	elseif (empty($email)){

		$message = "Email is empty";
		echo "<script type='text/javascript'>alert('$message');</script>";
	}
	elseif (empty($message)){

	$message ="Please enter a mesaage";
	echo "<script type='text/javascript'>alert('$message');</script>";}

	else {
		if(!mysqli_query($con,$insert)){
			echo "Error:" .$insert."<br>" .mysqli_error($con);
		}
		else{
			$message = "Record has been added successfully";
			echo "<script type='text/javascript'>alert('$message');</script>";
		}

	}
}
?>
</body>
</head>
</html>
