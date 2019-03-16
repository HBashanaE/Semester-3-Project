<?php 
	session_start();
	if($_POST['submit']){
		include_once('connection.php');
		$username = strip_tags($_POST['username']);
		$password = strip_tags($_POST['password']);
		$query = "INSERT INTO members(username,password,activated) VALUES('$username', '$password','1')";
		$result = mysqli_query($db_login,$query);
		if($result) {
			echo "Succesfully registered";
			header('Location: index.php');
		}
		else {
			echo "Failed to register";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
</head>
<body>
<h1>Register</h1>
<form method="post" action="register.php">
	<input type="text" name = "username" placeholder="Enter username">
	<input type="password" name="password" placeholder="Enter password here">
	<input type="submit" name="submit" value="Register">
</form>
<a href = "index.php" >Login</a>

</body>
</html>