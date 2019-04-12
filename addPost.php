<html>
<head>
<title>PHP File Upload example</title>
</head>
<body>
 
<form action="addPost.php" enctype="multipart/form-data" method="post">
Select image :
<input type="file" name="file"><br/>
<!-- <input type="submit" value="Upload" name="Submit1"> <br/> -->
<div>
			<textarea name = "description" cols="40" rows = "4" placeholder = "Write something" ></textarea>
</div>
<input type = "text" name = "title" placeholder = "Title">
		<input type = "text" name = "category" placeholder = "Category">
		<div>
			<input type = "submit" name = "upload" value = "Add Post">
		</div>
 
</form>
<?php
include_once('connection.php');
if(isset($_POST['upload']))
{ 
$filepath = "ads/" . $_FILES["file"]["name"];
 
if(move_uploaded_file($_FILES["file"]["tmp_name"], $filepath)) 
{
echo "<img src=".$filepath." height=200 width=300 />";
} 
else 
{
echo "Error !!";
}
$db = mysqli_connect("localhost","root","","login");
$images = $_FILES['file']['name'];
		$title = $_POST['title'];
		$description = $_POST['description'];
		$category = $_POST['category'];
		$sql = "INSERT INTO ads(images, description,title,category) VALUES ('$images','$description','$title','$category');";
		mysqli_query($db,$sql);
		
} 
?>
 
</body>
</html>