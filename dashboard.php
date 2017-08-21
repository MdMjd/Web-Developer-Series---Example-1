<?php
include 'db.php';
session_start();
?>

<html>
<head>
<meta charset="utf-8" />
<title></title>
</head>
<body>
<?php

$admin = "test1";
$link_address = "project.php";

if(isset($_SESSION['susername'])) {
		echo "Welcome, ".$_SESSION['susername'];
		echo '<br><a href="logout.php">Log Out</a>';

		echo'<form action="dashboard.php" method="POST">
                            <label> Enter Username: </label>
                            <input type="text" name="u" />
                            <br>
                            </br>
                            <label>Email: </label>
                            <input type="text" name="e" />
                            <br>
                            </br>
                            <label>Phone Number: </label>
                            <input type="text" name="n" />
                            <br>
                            </br>
                            <label>Choose Password: </label>
                            <input type="password" name="p" />
                            <br>
                            </br>
                            <label>Verify Password: </label>
                            <input type="password" name="p2" />
                            <br>
                            </br>
                            <input type="submit" name="r" value="Update" />

                            </form>';

	if($_SESSION['susername'] == $admin) {

	$select = "SELECT * FROM register";
	$query = mysqli_query($con,$select);
	$check = mysqli_num_rows($query);

	if($check > 0 ) {
		echo "<table border = 1>";
			echo "<th>Username</th><th>Email</th><th>Phone</th><th>Password</th>";
			while($row = mysqli_fetch_row($query)) {
				echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td></tr>";
			}
		echo "</table>";
		}

		echo'<form action="dashboard.php" method="POST">
                            <label> Enter Username: </label>
                            <input type="text" name="u" />
                            <br>
								    <input type="submit" name="j" value="Delete" />

                            </form>';
	}

	} else {
		echo "Please Login First or Register Below";
		echo "<a href='".$link_address."'>Link</a>";
	}


if(isset($_POST['r'])) {
		$username = $_POST['u'];
		$email = $_POST['e'];
		$phone = $_POST['n'];
		$password = $_POST['p'];

		$update = "UPDATE register SET semail='$email', sphone='$phone', spassword ='$password' WHERE susername='$username'";

		if(!mysqli_query($con,$update)) {
		echo "Error: " . $update . "<br>" . mysqli_error($con);
		} else {
			echo "Record has been updated successfully";
		}
	}


	elseif(isset($_POST['j'])) {
		$username = $_POST['u'];

		$delete = "DELETE FROM register where susername='$username'";

		if(!mysqli_query($con,$delete)) {
		echo "Error: " . $delete . "<br>" . mysqli_error($con);
		} else {
			echo "Record has been deleted successfully";
		}
	}
?>


</body>
</html>
