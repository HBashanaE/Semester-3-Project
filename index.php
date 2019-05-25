<!DOCTYPE html>
<?php
 //Access-Control-Allow-Origin header with wildcard.
header('Access-Control-Allow-Origin: *');
//$logged=false;

session_start();
if (isset($_POST['submit'])) {
    if ($_POST['submit']) {
        include_once('connection.php');
        $username = strip_tags($_POST['username']);
        $password = strip_tags($_POST['password']);

        $sql = "SELECT activated, username, password FROM members where username = '$username' LIMIT 1";
        $query = mysqli_query($db_login, $sql);
        if ($query) {
            $row = mysqli_fetch_row($query);
            $userId = $row[2];
            $dbUserName = $row[1];
            $dbPassword = $row[2];
        }
        if (!empty($_POST['username'])) {
            if ($username == $dbUserName && $password == $dbPassword) {
                $_SESSION['username'] = $username;
                $_SESSION['id'] = $userId;
                header('Location: index.php');
            } else {
                echo "<b><i>Invalid password</i><b>";
            }
        } else {
            $show_modal = true;
        }
    }
}
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
    <title>කුළියට</title>
    <link rel="shortcut icon" href="Resources/favicon.ico">
    <!-- Bootstrap CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap Local -->
    <link rel="stylesheet" href="Resources/bootstrap/css/bootstrap.min.css">
    <script src="Resources/bootstrap/js/bootstrap.min.js"> </script>
    <script src="//Resources/jquery/jquery-3.3.1.min"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="Resoures/styles.css" rel="stylesheet">

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
                <form method="post" name="login" action="index.php" class="form-inline " style="content-right">
                    <input type="text" name="username" class="form-control mr-sm-2" placeholder="Username or email" required>
                    <input type="password" name="password" class="form-control mr-sm-2" placeholder="Password" required>
                    <button type="submit" name="submit" class="float btn btn-outline-info my-2 my-sm-0 mr-sm-2 mr-xs-1 my-xs-0" value="login">
                    Login</button>
                </form>
                <!-- Register button -->
                <form action="register.php">
                    <input type="submit" class="float btn btn-outline-info my-2 my-sm-0 mr-sm-2 mr-xs-1 my-xs-0" value="Register" />
                </form>
            </div>
        </div>

        <!-- Div for logged user items -->
        <div class="logged_user" id="div_logged_user" <?php if ($logged === false) { ?>style="display:none" <?php } ?>>
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

    <!-- Search section -->
    <section class="search-sec">
        <div class="container">
            <form id="searchForm" action="searchResult.php" method="GET" onsubmit="return validateSearchfield();">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <div class="row align-items-center">
                            <div class="col-lg-5 col-md-5 col-sm-12 p-2">
                                <input id="searchField" type="text" name="query" class="form-control search-slt" placeholder="What do you want?" required>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-12 p-2">
                                <select class="form-control search-slt" name="category" id="selectCategory" placeholder="Select Category">
                                    <option>All</option>
                                    <option>Vehicles</option> <!-- 00 -->
                                    <option>Cleaning appliences</option> <!-- 01 -->
                                    <option>Electrical/Electronic</option> <!-- 02 -->
                                    <option>Catering</option> <!-- 03 -->
                                    <option>Building and construction</option> <!-- 04 -->
                                    <option>Other</option> <!-- 99 -->
                                </select>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-12 p-2 ">
                                <!-- <button type="button" value="Search" class="btn btn-primary wrn-btn">Search</button> -->
                                <input type="submit" class="btn btn-info active align-items-center" value="Search">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <div>
    <?php
        $db=mysqli_connect("localhost" , "root", "", "login");
        $sql= "SELECT * FROM ads LIMIT 10";
        $result= mysqli_query($db,$sql);
        while ($row=mysqli_fetch_array($result)){
            if ($row['approve']=='approve'){
                echo "<div class= 'container'>"; 
            echo "<div class = 'card mb-3' style='height: 500px; width:90%;'>";
                echo "<img src='myimage/".$row['image']."' class ='card-img-top img-responsive' alt = 'Responsive image' style ='width : auto ; height:400px;'>";
                echo "<div class='card-body'>";
                echo '<h5 class="card-title">'.$row['title'].'</h5>';
                echo '<p class="card-text">'.$row['title'].'</p>';
                echo '<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>';

                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo"</br>";
        }
    }

    ?>
    </div>

    <!-- Floating button -->
    <div <?php if($logged===false ){?>style="display:none" <?php }?>>
        <a href="upload.php" class="float" style="position:fixed;
                width:60px;
                height:60px;
                bottom:40px;
                right:40px;
                background-color:#0275d8 ;
                color:#FFF;
                border-radius:10px;
                text-align:center;
                box-shadow: 2px 2px 3px #999;" data-toggle="tooltip" data-placement="left" title="Post an ad">
            <i class="fa fa-plus my-float" style="margin-top:22px;" ></i>  
        </a>
    </div>
    <!-- Floating button -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    
</body>

</html> 