<?php
include_once('dbh.php');
$db = dbh::getDataBase();
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

<html>
<head>
    <meta charset="ISO-8859-1">
    <title>කුළියට: User Account</title>
    <link rel="shortcut icon" href="Resources/favicon.ico">
    <!-- Bootstrap Local -->
    <link rel="stylesheet" href="Resources/bootstrap/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="Resoures/styles.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">


</head>

<body>


<nav class="navbar navbar-dark bg-dark justify-content-between">
        <!-- Logo -->
        <a class="navbar-brand">
            <img classs="img-responsive" width="" height="75px" src="Resources/Kuliyata_logo_full.png">
        </a>

        <!-- Div for logged user items -->
        <div class="logged_user" id="div_logged_user" <?php $logged=true; if ($logged === false) { ?>style="display:none" <?php } ?>>
            <div class="btn-group">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false">
                    <?php echo $username ?>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" type="button">Another action</a>
                    <a class="dropdown-item" type="button" href="logout.php">Logout</a>
                </div>
                <button type="button" class="btn btn-warning"><a href="upload.php">Post AD</a></button>
            </div>
        </div>
    </nav>


<?php

echo "<font color='blue' size='+100'><center>Welcome $username ! </center></font>";
echo "<br>";

    $db = dbh::getDataBase();
        $sql= "SELECT * FROM ads WHERE username='$username'";
        $result= mysqli_query($db,$sql);
        while ($row=mysqli_fetch_array($result)){
            if ($row['approve']=='approve'){
                echo "<div class= 'container'>"; 
                
                echo "<div class = 'card mb-3' style='height: auto; width:90%;'>";
                echo "<div class='card-body'>";
                echo '<h2 class="card-head">'.$row['title'].'</h2>';
                
                echo"</br>";
                echo "<img src='ads/".$row['image']."' class ='card-img-top img-thumbnail' alt = 'Thumbnail image' style ='width : auto ; height:400px;'>";
                echo "<div class='card-body'>";
                echo '<pre class="card-text">'.$row['description'].'</pre>';
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo"</br>";
            }
        }
?>

<?php
//   ***************************code for deleting account***************************************
/*
echo "<div class='container'>";
	echo "<form method = 'GET'>";
    //echo "<button>".'del Accnt'."</button>";
    echo '<button type="submit" class="btn btn-danger" name="btn_delete">Delete My Account</button>';

    echo "<input type = 'text' name = 'delete_name' placeholder = 'password'>";
  echo "</form>";
  //echo"done -3"; die;
  if (isset($_POST['btn_delete'])) {
    echo"done -2"; die;
      if ($_POST['btn_delete']) {
        echo"done -1"; die;
  $db = mysqli_connect("localhost","root","","login");
  $sqlp = "SELECT * FROM members";
  $result = mysqli_query($db,$sqlp);
  $USER = $_GET['delete_name'];
	$username = $row['username'];
	while ($row = mysqli_fetch_array($result)){
        echo"done0"; die;
    if($USER==$username ){
        echo"done1"; die;
                  $username = $row['username'];

									$password = $row['password'];
									$email= $row['mail'];
									$sqli = "INSERT INTO delmembers(username,password,email) VALUES ('$username','	$password','$email');";
                                    mysqli_query($db,$sqli);
                                    echo"done2";die;
									$sql = "DELETE FROM members WHERE username = $username";
									mysqli_query($db,$sql);
									if ($conn->query($sql) == TRUE){
										echo "<div id = 'valid'>";
											echo "record deleted".$row['id'];
										echo "</div>";
									}else {
										echo "error deleting rexcord".$conn->error;
									}
                  $conn->close();
                }
            }
        }
      }
  echo "</div>";
  */
  //   ***************************code for deleting account  ***** ends***************************************
?>
<br/><br/>
<pre></pre><pre></pre><pre></pre><pre></pre><pre></pre>
<nav class="navbar fixed-bottom navbar-expand-lg navbar-dark bg-dark justify-content-between">
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