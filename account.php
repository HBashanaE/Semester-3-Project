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
                    <?php $username = $_GET['username']; echo htmlentities($username) ?>
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

$name = $_GET['username'];
//echo "<div> ";
echo "<font color='blue' size='+100'><center>Welcome $name ! </center></font>.\"<br>\"";

    $db=mysqli_connect("localhost" , "root", "", "login");
        $sql= "SELECT * FROM ads WHERE username='$name'";
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
                echo"</br>"."</br>";
            }
        }
?>
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