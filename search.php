<?php
session_start();
//only if session is created then user has logged in
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
        <div class="generel_user" id="div_generel_user" <?php if ($logged === true) { ?>style="display:none" <?php 
                                                                                                            } ?>>

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
        $query = $_GET['query'];
        if ($_GET['category']) {
            $category = $_GET['category'];
        }

        // gets value sent over search form

        $categoryDigit = null;
        switch ($category) {
            case "Vehicles":
                $categoryDigit = '00';
                break;
            case "Cleaning appliences":
                $categoryDigit = '01';
                break;
            case "Electrical/Electronic":
                $categoryDigit = '02';
                break;
            case "Catering":
                $categoryDigit = '03';
                break;
            case "Building and construction":
                $categoryDigit = '04';
                break;
            case "Other":
                $categoryDigit = '99';
                break;
            default:
                $categoryDigit = '100';
        }


        $query = htmlspecialchars($query);
        // changes characters used in html to their equivalents, for example: < to &gt;

        //$query = mysqli_real_escape_string($query);
        // makes sure nobody uses SQL injection
        if($categoryDigit==='100'){
            $sqlQuery = "SELECT * FROM ads WHERE (`title` LIKE '%" . $query . "%') OR (`description` LIKE '%" . $query . "%')";
        }else{
            $sqlQuery = "SELECT * FROM ads WHERE ((`title` LIKE '%" . $query . "%') OR (`description` LIKE '%" . $query . "%')) AND (category='$categoryDigit')";
        }
        

        //$sqlQuery = "SELECT * FROM ads WHERE category= 01";
        
        $raw_results = mysqli_query($db_login, $sqlQuery) or die(mysql_error());
        
        // * means that it selects all fields, you can also write: `id`, `title`, `text`
        // articles is the name of our table

        // '%$query%' is what we're looking for, % means anything, for example if $query is Hello
        // it will match "hello", "Hello man", "gogohello", if you want exact match use `title`='$query'
        // or if you want to match just full word so "gogohello" is out use '% $query %' ...OR ... '$query %' ... OR ... '% $query'

        if (mysqli_num_rows($raw_results) > 0) { // if one or more rows are returned do following

            while ($results = mysqli_fetch_array($raw_results)) {
                //print_r($results);
                // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop

                //echo "<p><h3>".$results['title']."</h3>".$results['description']."</p>";
                echo "<div class=\"card my-5\" style=\"width: 80%; height: auto;\">";
                echo "  <img class=\"card-img-top\" src='ads/". $results['image']."' alt='". $results['image']."'style=\"width: 40%; height: auto\"" . $results['title'] . ">";
                echo "  <div class=\"card-body\">";
                echo "      <h5 class=\"card-title\">" . $results['title'] . "</h5>";
                echo "      <p class=\"card-text\">" . $results['description'] . "</p>";
                echo "      <a href='' class='btn btn-primary'>View</a>";
                echo "  </div>";
                echo "</div>";

            }
        } else { 
            echo "No results found";
        }

        ?>
    </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>

</html> 