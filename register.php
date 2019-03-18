<?php 
    session_start();
    if (isset($_POST['submit'])) {
	if($_POST['submit']){
		$username = strip_tags($_POST['username']);
        $password = strip_tags($_POST['password']);
        $email = strip_tags($_POST['email']);
        $cpassword = strip_tags($_POST['re_password']);
    /*    if ($password==$cpassword){
		$db = mysqli_connect("localhost", "root", "", "login") or die ("Failed to connect");
		$query = "INSERT INTO members(username,password,activated) VALUES('$username', '$password','1')";
		$result = mysqli_query($db,$query);
		if($result) {
			echo "Succesfully registered";
			header('Location: index.php');
		}
		else {
			echo "Failed to register";
		}
        }else{
            echo "password wrong";
        }

    }
    }*/
    include 'test.php';
    $users = new dbh();
    $users->saveToDatabase($username,$password,$email,$cpassword);
}
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>
   
    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
<!--<h1>Register</h1>
<form method="post" action="register.php">
	<input type="text" name = "username" placeholder="Enter username">
	<input type="password" name="password" placeholder="Enter password here">
	<input type="submit" name="submit" value="Register">
</form>

<a href = "index.php" >Login</a>-->




   <div class="main">
   <!--<img src="images/signup-bg.jpg" alt="">-->
        <section class="signup">
             
            <div class="container">
                <div class="signup-content">
                    <form method="POST" action = "register.php" id="signup-form" class="signup-form">
                        <h2 class="form-title">Create account</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="username" id="name" placeholder="Your Name"/>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-input" name="email" id="email" placeholder="Your Email"/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="password" id="password" placeholder="Password"/>
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="re_password" id="re_password" placeholder="Repeat your password"/>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Register"/>
                        </div>
                    </form>
                    <p class="loginhere">
                        Have already an account ? <a href="index.php" class="loginhere-link">Login here</a>
                    </p>
                </div>
            </div>
        </section>
    
    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>


</body>
</html>