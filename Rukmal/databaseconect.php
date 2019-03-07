<?php 
	include_once 'includes/dph.inc.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title>This is Document</title>
</head>
<style>
	body {
		background-image: url(girl.jpg);
		background-repeat: no-repeat;
		background-size:cover;
		width:1000px;
		height:400px;
	}
	h1{
		color:green;
		font-family:Algerian;
		Margin-Left:40%;
		Margin-Right:10%;
		
	}
	h2{
		font-family:Algerian;
		Margin-Left:40%;
		Margin-Right:10%;
	}
	input[type=text],input[type=password]{
		box-sizing:border-box;
		background-color:ash;
		font-color:black;
		width:200%;
		height:30px;
	}
	button{
		background-color:ash;
		color:black;
		width:95%;
	}
	.para{
		Margin-Left:36%;
		Margin-Right:36%;
	}
</style>

<body>
<h1 align="center">Welcome to SignUp Page</h1>
<h2 align="center">fuuuuuuuuuuuuuuuuuuuuukkk</h2>
<form action = "includes/signup.inc.php" method = "POST">
<div class="para">
	<button type = 'submit' name = 'submit'>Sign Up</button>
	<p><input type = "text" name = "first" placeholder = "FirstName"></p>
	<p><input type = "text" name = "last" placeholder = "LastName"></p>
	<p><input type = "text" name = "email" placeholder = "E-mail"></p>
	<p><input type = "text" name = "uid" placeholder = "UserName"></p>
	<p><input type = "password" name = "first" placeholder = "PassWord"></p>
	
</div>
</form>



</body>
</html>