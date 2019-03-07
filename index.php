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





<html>

<head>
<meta charset="ISO-8859-1">
<title>Kuliyata</title>
 <style>
    <meta charset="ISO-8859-1">
    <title>කුළියට</title>
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
    
</head>

<body>
    <div class="form-inline container align-items-right">
        <div class=" heading">
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
    <div class="container" align="center">
        <a href="register.php">Register</a>
    </div>
    <section class="search-sec" align="center">
        <div class="container">
            <form action="search.php" method="GET">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <div class="row align-items-center">
                            <div class="col-lg-3 col-md-3 col-sm-12 p-2">
                                <input type="text" name="query" class="form-control search-slt"
                                    placeholder="What do you want?">
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 p-2">
                                <select class="form-control search-slt" id="exampleFormControlSelect1">
                                    <option>Select Category</option>
                                    <option>Vehicles</option>
                                    <option>Cleaning appliences</option>
                                    <option>Electrical/Electronic</option>
                                    <option>Catering</option>
                                    <option>Building and construction</option>
                                    <option>Other</option>
                                </select>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 p-2 ">
                                <!-- <button type="button" value="Search" class="btn btn-primary wrn-btn">Search</button> -->
                                <input type="submit" class="btn btn-info active" value="Search">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</body>

</html>