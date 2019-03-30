<!DOCTYPE html>
<?php
$logged=false;
session_start();
if (isset($_POST['submit'])) {
if($_POST['submit']) {
	include_once('connection.php');
	$username = strip_tags($_POST['username']);
	$password = strip_tags($_POST['password']);

	$sql = "SELECT activated, username, password FROM members where username = '$username' LIMIT 1";
	$query = mysqli_query($db_login, $sql);
	if($query) {
		$row = mysqli_fetch_row($query);
		$userId= $row[2];
		$dbUserName = $row[1];
		$dbPassword = $row[2];
    }
    if(!empty($_POST['username'])){
        if($username == $dbUserName && $password == $dbPassword) {
            $_SESSION['username'] = $username;
        $_SESSION['id'] = $userId;
            header('Location: index.php');
        }
        else {
            echo "<b><i>Invalid password</i><b>";
        }
    }else{
         echo '<div class="modal fade bd-example-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">';
         echo '<div class="modal-dialog modal-sm">';
         echo '  <div class="modal-content">';
         echo '    ...';
         echo '  </div>';
         echo '</div>';
         echo '</div>';

       echo'<script> $(\'#myModal\').modal(\'show\');</script>';
    //echo '<script> window.alert("Don\'t waste time")</script>';

    }
}
}
//only if session is created then user has logged in
if (isset($_SESSION['id'])){
	$userId = $_SESSION['id'];
  $username = $_SESSION['username'];
  $logged=true; 
}else{
  $logged=false;
  }
?>

<html>

<head>
    <meta charset="ISO-8859-1">
    <title>කුළියට</title>
    <link rel="shortcut icon" src="Resources/favicon.ico" type="image/x-icon" />
    <!-- Bootstrap CDN-->
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
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

    <!-- Bootstrap Local -->
    <link rel="stylesheet" href="Resources/bootstrap/css/bootstrap.min.css">
    <script src="Resources/bootstrap/js/bootstrap.min.js"> </script>

    <!-- File uploader plugin -->

    <script src="Resources/fileUploader/dropzone.js"></script>

    <!-- <link href="http://hayageek.github.io/jQuery-Upload-File/4.0.11/uploadfile.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="http://hayageek.github.io/jQuery-Upload-File/4.0.11/jquery.uploadfile.min.js"></script> -->

    <link href="Resources/dist/css/jquery.dm-uploader.min.css" rel="stylesheet">
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
        <div class="generel_user" id="div_generel_user" <?php if($logged===true ){?>style="display:none" <?php }?>>

            <div class="row">
                <!-- Login form -->
                <form method="post" action="index.php" class="form-inline " style="content-right">
                    <input type="text" name="username" class="form-control mr-sm-2" placeholder="Username or email" required>
                    <input type="password" name="password" class="form-control mr-sm-2" placeholder="Password" required>
                    <button type="submit" name="submit"
                        class="float btn btn-outline-info my-2 my-sm-0 mr-sm-2 mr-xs-1 my-xs-0"
                        value="login">Login</button>
                </form>
                <!-- Register button -->
                <form action="register.php">
                    <input type="submit" class="float btn btn-outline-info my-2 my-sm-0 mr-sm-2 mr-xs-1 my-xs-0"
                        value="Register" />
                </form>
            </div>
        </div>
        <!-- Div for logged user items -->
        <div class="logged_user" id="div_logged_user" <?php if($logged===false ){?>style="display:none" <?php }?>>
            <div class="btn-group">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"
                    data-display="static" aria-haspopup="true" aria-expanded="false">
                    <?php echo htmlentities($username) ?>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" type="button">Account</a>
                    <a class="dropdown-item" type="button">Another action</a>
                    <a class="dropdown-item" type="button" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Search section -->
    <section class="search-sec">
        <div class="container">
            <form action="search.php" method="GET">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <div class="row align-items-center">
                            <div class="col-lg-5 col-md-5 col-sm-12 p-2">
                                <input type="text" name="query" class="form-control search-slt"
                                    placeholder="What do you want?">
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-12 p-2">
                                <select class="form-control search-slt" name="category" id="selectCategory">
                                    <option>Select Category</option>
                                    <option>Vehicles</option>
                                    <option>Cleaning appliences</option>
                                    <option>Electrical/Electronic</option>
                                    <option>Catering</option>
                                    <option>Building and construction</option>
                                    <option>Other</option>
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

    <!-- Upload image -->
    <div class="row">
        <div class="col-md-6 col-sm-12">

            <!-- Our markup, the important part here! -->
            <div id="drag-and-drop-zone" class="dm-uploader p-5">
                <h3 class="mb-5 mt-5 text-muted">Drag &amp; drop files here</h3>

                <div class="btn btn-primary btn-block mb-5">
                    <span>Open the file Browser</span>
                    <input type="file" title='Click to add Files' />
                </div>
            </div><!-- /uploader -->

        </div>
        <div class="col-md-6 col-sm-12">
            <div class="card h-100">
                <div class="card-header">
                    File List
                </div>

                <ul class="list-unstyled p-2 d-flex flex-column col" id="files">
                    <li class="text-muted text-center empty">No files uploaded.</li>
                </ul>
            </div>
        </div>
    </div><!-- /file list -->


    <div class="row">
        <div class="col-12">
            <div class="card h-100">
                <div class="card-header">
                    Debug Messages
                </div>

                <ul class="list-group list-group-flush" id="debug">
                    <li class="list-group-item text-muted empty">Loading plugin....</li>
                </ul>
            </div>
        </div>
    </div> <!-- /debug -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="Resources/dist/js/jquery.dm-uploader.min.js"></script>
    <script src="demo-ui.js"></script>
    <script src="demo-config.js"></script>

    <!-- File item template -->
    <script type="text/html" id="files-template">
    <li class="media">
        <div class="media-body mb-1">
            <p class="mb-2">
                <strong>%%filename%%</strong> - Status: <span class="text-muted">Waiting</span>
            </p>
            <div class="progress mb-2">
                <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar"
                    style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                </div>
            </div>
            <hr class="mt-1 mb-1" />
        </div>
    </li>
    </script>

    <!-- Debug item template -->
    <script type="text/html" id="debug-template">
    <li class="list-group-item text-%%color%%"><strong>%%date%%</strong>: %%message%%</li>
    </script>

</body>

</html>