<?php 
    session_start();
    if (isset($_POST['submit'])) {
	if($_POST['submit']){
		include_once('connection.php');
		$username = strip_tags($_POST['username']);
        $password = strip_tags($_POST['password']);
        $hashedpassword = password_hash($password, PASSWORD_DEFAULT);
        $email = strip_tags($_POST['email']);
        $cpassword = strip_tags($_POST['re_password']);
    include 'dbh.php';
    // $users = new dbh();
    // $users->saveToDatabase($username,$hashedpassword,$email,$cpassword);
    dbh::saveToDatabase($username,$hashedpassword,$email,$cpassword);
}
    }
?>

<!DOCTYPE html>
<html>
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Your කුළියට Account</title>
   
    <!-- Main css -->
    
    <link rel="shortcut icon" href="Resources/favicon.ico">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- File uploader plugin -->

    <script src="Resources/fileUploader/dropzone.js"></script>



    <link href="Resources/dist/css/jquery.dm-uploader.min.css" rel="stylesheet">
    <link href="Resoures/styles.css" rel="stylesheet">
    <!--<link rel="stylesheet" href="style.css">-->
</head>
<body>
<nav class="navbar navbar-dark bg-dark justify-content-between">
    <a class="navbar-brand">
    <img classs="img-responsive" width="" height="75px"  src="Resources/Kuliyata_logo_full.png" >
    </a>
</nav>




   <div class="main">
   
        <section class="signup">
             
            <div class="container">
                <div class="signup-content">
                    <form method="POST" >
                        <h2 class="form-title">Create account</h2>

                        <!--<div class="form-group">-->
                        <div class="col-md-5 mb-3">
                        <label for="validationDefaultUsername">Username</label>
                        <div class="input-group">
                           <!-- <div class="input-group-prepend">
                                <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
                            </div>-->
                            <input type="text" class="form-control" id="validationDefaultUsername" name="username"  placeholder="User Name" aria-describedby="inputGroupPrepend2" required>
                            <!--<div class="valid-tooltip">
                                Please choose a unique and valid username.
                            </div>-->
                            <span id="user-result"></span>
                        </div>
                        </div>
                        
                        <div class="col-md-5 mb-3">
                        <label for="validationDefault03">E-Mail Address</label>
                            <input type="email" class="form-control" name="email" id="validationDefault01" placeholder="Your Email" required>
                        </div>
                        <div class="col-md-5 mb-3">
                        <label for="validationDefault04">Password</label>
                            <input type="password" class="form-control" name="password" id="validationDefault02" placeholder="Password" required>
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                            <small id="passwordHelpInline" class="text-muted">
                                Must be 8-20 characters long.
                            </small>
                        </div>
                        <div class="col-md-5 mb-3">
                        <label for="validationDefault05">Re-Enter Password</label>
                            <input type="password" class="form-control" name="re_password" id="validationDefault03" placeholder="Repeat your password" required>
                        </div>
                        
                        <div class="form-group">
                    
                        <div class="form-check">
                            <input type="checkbox" name="agree-term"  class="form-check-input" id="invalidCheck2" required >
                            <label class="form-check-label" for="invalidCheck2">I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            <div class="invalid-feedback">Example invalid feedback text</div>
                        </div>
                        </div>
                        <div class="col-md-5 mb-3">
                            <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Register"/>
                        </div>
                        
                    </form>
                        
                    <p class="loginhere">
                        Have already an account ? <a href="index.php" class="loginhere-link">Login here</a>
                    </p>
                </div>
            </div>
        </section>
        </div>

        <script type="text/javascript">
    $(document).ready(function() {
	var x_timer; 	
	$("#validationDefaultUsername").keyup(function (e){
		clearTimeout(x_timer);
		var user_name = $(this).val();
		x_timer = setTimeout(function(){
			check_username_ajax(user_name);
		}, 1000);
	});	

function check_username_ajax(username){
	$("#user-result").html('<img src="ajax-loader.gif" />');
	$.post('username-checker.php', {'username':username}, function(data) {
	  $("#user-result").html(username);
	});
}
});
</script>
 

  
    

<script src="vendor/jquery/jquery.min.js"></script>
<script src="js/main.js"></script>  

<!--
<nav class="navbar expand-bottom navbar-expand-lg navbar-dark bg-dark justify-content-between">
<ul class="navbar-nav mr-auto">
  <li class="nav-item">
    <a class="nav-link active" href="index.php">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Help & Support</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Learn More</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled" href="#">About Us</a>
  </li>
</ul>
<a class="nav-link" href="index.php"> <img classs="img-responsive" width="" height="75px" src="Resources/Kuliyata_logo_full.png" ></a>

</nav>
-->

    <pre></pre><pre></pre><pre></pre><pre></pre><pre></pre>
<nav class="navbar  navbar-expand-lg navbar-dark bg-dark justify-content-between">
<ul class="navbar-nav mr-auto">
  <li class="nav-item">
    <a class="nav-link active" href="index.php">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Help & Support</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Learn More</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled" href="#">About Us</a>
  </li>
</ul>
<a class="nav-link" href="index.php"> <img classs="img-responsive" width="" height="75px" src="Resources/Kuliyata_logo_full.png" ></a>

</nav>
</body>
</html>