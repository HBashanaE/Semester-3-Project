<?php
$mgs="";
    session_start();
    //only if session is created then user has logged in
if (isset($_SESSION['id'])) {
    $userId = $_SESSION['id'];
    $username = $_SESSION['username'];
    $logged = true;
} else {
    $logged = false;
}


    if (isset($_POST['submit_image'])) {
	if($_POST['submit_image']){
        $target = "ads/".basename($_FILES['myimage']['name']);
        $imagename=$_FILES["myimage"]["name"];
        $discription=$_POST["description"];
        $title=$_POST["category"];
        include 'ad.php';
        $ad= new Ad();
        $ad->addPost($username,$imagename,$discription, $title,$target);
    }
}


?>

<html>
<head>
<title>Upload Your කුළියට.lk Avertisement</title>
    <!-- Bootstrap CDN-->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"> -->
    
    <!-- Bootstrap Local -->
    <link rel="stylesheet" href="Resources/bootstrap/css/bootstrap.min.css">
    <script src="Resources/bootstrap/js/bootstrap.min.js"> </script>
    <script src="//Resources/jquery/jquery-3.3.1.min"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
<nav class="navbar navbar-dark bg-dark justify-content-between">
    <a class="navbar-brand">
        <img classs="img-responsive" width="" height="75px" src="Resources/Kuliyata_logo_full.png">
    </a>
    <div class="logged_user" id="div_logged_user" <?php if ($logged === false) { ?>style="display:none" <?php } ?>>
            <div class="btn-group">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"
                    data-display="static" aria-haspopup="true" aria-expanded="false">
                    <?php echo htmlentities($_SESSION['username']) ?>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" type="button">Account</a>
                    <a class="dropdown-item" type="button">Another action</a>
                    <a class="dropdown-item" type="button" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </nav>
<div <?php if ($logged === false) { ?>style="display:none" <?php } ?>>	 	
    <form method="POST" action="upload.php" enctype ="multipart/form-data">
    <input type="hidden" name ="size" value="1000000" >
    <div class ="col-lg-5 col-md-5 col-sm-12 p-2">
        
        <select class="form-control search-slt" type = "text" name= "category" id="selectCategory" required>
            <option value="">Select Category</option>
            <option>Vehicles</option>
            <option>Cleaning appliences</option>
            <option>Electrical/Electronic</option>
            <option>Catering</option>
            <option>Building and construction</option>
            <option>Other</option>
        </select>
    </div>
    <div class="file-upload">
 <input type="file" class= "form-submit" name="myimage" required>
 </div>
 <div class="textarea" class="form-group" >
 <textarea class="form-control" id="description " rows="5" name ="description"  placeholder = "Discription" maxlength="749" required></textarea>
 </div>
 <input type="submit" name="submit_image" class = "button" : hover value="Upload">
 </div>
 </div>
</form>

<!-- Div for generel user items -->
<div class="generel_user " id="div_generel_user" <?php if ($logged === true) { ?>style="display:none" <?php } ?>>
<h1 class="text-danger text-center">
    Access Denied
</h1>
</div>



<div class="container">
    <h2>Quick rules</h2>
    <div class="row">
        <p>* Make sure you post in the correct category. </p>
    </div>
    <div class="row">
        <p>* Do not post ads containing multiple items.</p>
    </div>
    <div class="row">
        <p>* Do not post more than one picture.</p>
    </div>
        <p><a class="btn btn-secondary" href="#" role="button">View details »</a></p>
</div>


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