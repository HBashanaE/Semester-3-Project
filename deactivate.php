<?php
include_once('dbh.php');
$db = dbh::getDataBase();
$username = $_POST['username'];

// echo $username;
$sql = "SELECT * FROM members WHERE username = '$username'";

$result = mysqli_query($db,$sql);
//var_dump($result); die;
$row = mysqli_fetch_array($result);
//var_dump($row); die;

$username = $row['username'];
$email= $row['mail'];
$password = $row['password'];

$sql = "INSERT INTO deleted_user (username,password,email) VALUES ('$username','$password','$email')";
mysqli_query($db,$sql);


$sql = "DELETE FROM members WHERE username = '$username' ";
if(mysqli_query($db,$sql)){
    session_start();
	session_destroy();
    echo '1';
}else{
    echo '0';
}

// "INSERT INTO showadds(image,title,catagory, text,price,pnum) VALUES ('$image','$title','$list','$text','$price','$tnum');"
// "DELETE FROM alladds WHERE id = $id ";
