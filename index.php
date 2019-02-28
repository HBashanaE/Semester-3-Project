<!DOCTYPE html>
<?php
session_start();
if (isset($_POST['submit'])) {
if($_POST['submit']) {
	include_once('connection.php');
	$username = strip_tags($_POST['username']);
	$password = strip_tags($_POST['password']);

	$sql = "SELECT activated,username ,password FROM members where username = '$username' LIMIT 1";
	$query = mysqli_query($db, $sql);
	if($query) {
		$row = mysqli_fetch_row($query);
		$userId= $row[2];
		$dbUserName = $row[1];
		$dbPassword = $row[2];
	}
	if($username == $dbUserName && $password == $dbPassword) {
		$_SESSION['username'] = $username;
		$_SESSION['id'] = $userId;
		header('Location: user.php');
	}
	else {
		echo "<b><i>Invalid password</i><b>";

	}
}
}
?>



<!--<html>
<head>
	<title>PHP-SQL Login</title>
  <style>
  body{
    

  }
  .login{
    
    padding: 10px;
    width: 400px;
    min-height: 400px;
    margin: 2% auto 0 auto;



  } 
  h1 {
      font-size: 3em;
      font-weight: 300;
      color: rgba(255, 255, 255, 0.7);
      display: inline-block;
      padding-bottom: 5px;
      text-shadow: 1px 1px 3px #23203b;
    }
  .input-group {
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    border-top: 1px solid rgba(255, 255, 255, 0.1);
  }
  input.form-control {
 
      padding: 10px;
      font-size: 1.6em;
      width: 100%;
      background: transparent;
      color: lighten(#AB9E95, 10%);

  }
  span {
        background: transparent;
        min-width: 53px;
        border: none;

        i {
          font-size: 1.5em;
          color: rgba(255, 255, 255, 0.2);
        }
  button {
      margin-top: 100px;
      background: linen;
      border: none;
      font-size: 1.6em;
      font-weight: 300;
      padding: 5px 10px;
      width: 100%;
      border-radius: 3px;
      color: lighten(linen, 40%);
      border-bottom: 4px solid darken($button-background-color, 10%);
  }
 .float {
  display: inline-block;
  -webkit-transition-duration: 0.3s;
  transition-duration: 0.3s;
  -webkit-transition-property: transform;
  transition-property: transform;
  -webkit-transform: translateZ(0);
  transform: translateZ(0);
  box-shadow: 0 0 1px rgba(0, 0, 0, 0);
  }

  </style>
</head>
<body>
<div class = "login">
<h1>Login</h1>
<form method="post" action="index.php">

<div class="input-group">
	<input type="text" name = "username" class ="from-control" placeholder="Enter username">
</div>
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-user"></i></span>
	<input type="password" name="password" class ="from-control" placeholder="Enter password here">
</div>
	<button type="submit" name="submit" class ="float" value="login">Login</button>
</form>

</div>
<a href="register.php" >Register</a>

</body>
</html>-->

<html>

<head>
<meta charset="ISO-8859-1">
<title>Kuliyata</title>
 <style>

    html {
        background: url(https://dl.dropboxusercontent.com/u/159328383/background.jpg) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }

    body {
        background-color: white;

$shadow-color: #23203b;
$input-color: lighten(#AB9E95, 10%);
$input-border-color: #5E5165;
$button-background-color: #27AE60;
 
* {
  margin: 100px;
  padding:100px;
}

html { 
  background-image: url("Kuliyata Logo.png");
  background: url(https://dl.dropboxusercontent.com/u/159328383/background.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: full;
}

body {
  


	
}

    @mixin normalize-input {
        display: block;
        width: auto;
        height: auto;
        border: none;
        outline: none;
        box-shadow: none;
        background: none;
        border-radius: 0px;
    }

    .login {
        padding: 15px;
        width: 400px;
        min-height: 400px;
        margin: 2% auto 0 auto;

        .heading {

            text-align: center;
            margin-top: 1%;
        }

        h2 {
            font-size: 3em;
            font-weight: 300;
            color: rgba(255, 255, 255, 0.7);
            display: inline-block;
            padding-bottom: 5px;
            text-shadow: 1px 1px 3px $shadow-color;
        }
    }

    form {
        .input-group {
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            border-top: 1px solid rgba(255, 255, 255, 0.1);

            &:last-of-type {
                border-top: none;
            }

            span {
                background: transparent;
                min-width: 53px;
                border: none;

                i {
                    font-size: 1.5em;
                    color: rgba(255, 255, 255, 0.2);
                }
            }
        }

        input.form-control {
            @include normalize-input;

            padding: 10px;
            font-size: 1.6em;
            width: 100%;
            background: transparent;
            color: $input-color;

            &:focus {
                border: none;
            }
        }

        button {
            margin-top: 100px;
            background: linen;
            border: none;
            font-size: 1.6em;
            font-weight: 300;
            padding: 5px 10px;
            width: 100%;
            border-radius: 3px;
            color: lighten(linen, 40%);
            border-bottom: 4px solid darken($button-background-color, 10%);

            &:hover {
                background: tint(linen, 4%);
                -webkit-animation: hop 1s;
                animation: hop 1s;
            }
        }
    }
    }

    .float {
        display: inline-block;
        -webkit-transition-duration: 0.3s;
        transition-duration: 0.3s;
        -webkit-transition-property: transform;
        transition-property: transform;
        -webkit-transform: translateZ(0);
        transform: translateZ(0);
        box-shadow: 0 0 1px rgba(0, 0, 0, 0);
    }

    .float:hover,
    .float:focus,
    .float:active {
        -webkit-transform: translateY(-3px);
        transform: translateY(-3px);
    }

    /* Large Devices, Wide Screens */

    @media only screen and (max-width : 1500px) {}

    @media only screen and (max-width : 1200px) {
        .login {
            width: 600px;
            font-size: 2em;
        }
    }

    @media only screen and (max-width : 1100px) {
        .login {
            margin-top: 2%;
            width: 600px;
            font-size: 1.7em;
        }
    }

    /* Medium Devices, Desktops */
    @media only screen and (max-width : 992px) {
        .login {
            margin-top: 1%;
            width: 550px;
            font-size: 1.7em;
            min-height: 0;
        }
    }

    /* Small Devices, Tablets */
    @media only screen and (max-width : 768px) {
        .login {
            margin-top: 0;
            width: 500px;
            font-size: 1.3em;
            min-height: 0;
        }
    }

    /* Extra Small Devices, Phones */
    @media only screen and (max-width : 480px) {
        .login {

            h2 {
                margin-top: 0;
            }

            margin-top: 0;
            width: 400px;
            font-size: 1em;
            min-height: 0;
        }
    }

    /* Custom, iPhone Retina */
    @media only screen and (max-width : 320px) {
        .login {
            margin-top: 100px;
            width: 200px;
            font-size: 0.7em;
            min-height: 0;
        }
    }
    }
    </style>
</head>

<body>
    <div class="login">
        <div class="heading">
            <h2>Sign in</h2>
            <form method="post" action="index.php">

                <div class="input-group input-group-lg">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" name="username" class="form-control" placeholder="Username or email">
                </div>

                <div class="input-group input-group-lg">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <p></p>
                <button type="submit" name="submit" class="float" value="login">Login</button>

            </form>
        </div>
    </div>
    <a href="register.php">Register</a>
</body>

</html>