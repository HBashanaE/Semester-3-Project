<?php
include_once('dbh.php');
$db = dbh::getDataBase();
$val = $_POST['val'];
$sql = "SELECT * FROM ads WHERE id = $val";
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_array($result);

$title = $row['title'];
$description = $row['description'];
$category = $row['category'];
$image_name = $row['image'];
$telephone = $row['telephone'];
$username = $row['username'];

$sql = "INSERT INTO deleted_ads (title,description,category,image_name,telephone,username) VALUES ('$title','$description','$category','$image_name','$telephone','$username')";
mysqli_query($db,$sql);

$sql = "DELETE FROM ads WHERE id = $val ";
if(mysqli_query($db,$sql)){
    echo 'Successfully deleted';
}else{
    echo 'Delete failed';
}

// "INSERT INTO showadds(image,title,catagory, text,price,pnum) VALUES ('$image','$title','$list','$text','$price','$tnum');"
// "DELETE FROM alladds WHERE id = $id ";
