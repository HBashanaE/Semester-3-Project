<?php
session_start();
if (isset($_SESSION['id'])) {
    $userId = $_SESSION['id'];
    $username = $_SESSION['username'];
    $logged = true;
} else {
    $logged = false;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>Search results</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!-- Bootstrap CDN -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script> -->

    <!-- Bootstrap Local -->
    <link rel="stylesheet" href="Resources/bootstrap/css/bootstrap.min.css">
    <script src="Resources/bootstrap/js/bootstrap.min.js"> </script>
    <!-- Validate username and passwords are filled -->
  <?php
		if(isset($_POST["submit"])){
			if(!empty($_POST['username'])){
                echo "The form is empty";
				return false;
			}
		}
	?>
    <script>
		function validate(){
			var username = document.forms["login"]["username"].value;
            var password = document.forms["login"]["password"].value;
				if(username== ""){
                    //alert("Enter valid username and password");
                    swal("Error", "Enter username and password", "error");
                    //$(window).load(function(){ $('#myModal').modal('show'); });
					return false;
				}
		}
	</script>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-dark bg-dark justify-content-between">
        <!-- Logo -->
        <a class="navbar-brand">
            <img classs="img-responsive" width="" height="75px" src="Resources/Kuliyata_logo_full.png">
        </a>
        <!-- Div for generel user items -->
        <div class="generel_user" id="div_generel_user" <?php if ($logged === true) { ?>style="display:none" <?php } ?>>

            <div class="row">
                <!-- Login form -->
                <form method="post" name="login" onsubmit="return validate();" action="index.php" class="form-inline " style="content-right">
                    <input type="text" name="username" class="form-control mr-sm-2" placeholder="Username or email">
                    <input type="password" name="password" class="form-control mr-sm-2" placeholder="Password">
                    <button type="submit" name="submit" class="float btn btn-outline-info my-2 my-sm-0 mr-sm-2 mr-xs-1 my-xs-0" value="login">Login</button>
                </form>
                <!-- Register button -->
                <form action="register.php">
                    <input type="submit" class="float btn btn-outline-info my-2 my-sm-0 mr-sm-2 mr-xs-1 my-xs-0" value="Register" />
                </form>
            </div>
        </div>
        <!-- Div for logged user items -->
        <div class="logged_user" id="div_logged_user" <?php if ($logged === false) { ?>style="display:none" <?php 
                                                                                                        } ?>>
            <div class="btn-group">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false">
                    <?php echo htmlentities($username) ?>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" type="button">Account</a>
                    <a class="dropdown-item" type="button">Another action</a>
                    <a class="dropdown-item" type="button" href="logout.php">Logout</a>
                </div>
                <button type="button" class="btn btn-warning"><a href="upload.php">Post AD</a></button>
            </div>
        </div>
    </nav>
    <div class="container">
        <?php
        include_once('connection.php');
        include_once('classes/Search.php');
        $query = $_GET['query'];
        if ($_GET['category']) {
            $category = $_GET['category'];
        }
        $search = new Search();
    

        $SQLQuery = $search->searchQ($query);
        echo $search->renderHTML($SQLQuery);
        ?>
    </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</body>

</html> 