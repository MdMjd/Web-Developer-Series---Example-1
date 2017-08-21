<?php
$host = "localhost";
$username = "root"; //Username PHPMYAdmin
$password = ""; //Password PHPMyAdmin
$db = ""; //Database
$tb = ""; //Table

$con = mysqli_connect("$host","$username","$password","$db");

//If Connection Error is found, echo Error ELSE echo Established. Get Rid if all is working
if(mysqli_connect_error()) {
	echo "Connection Error";
	mysqli_connect_error(); //Shows Error Appropriately from Library
} else
	echo "Connection Established";
	echo "<br><br>";
?>
