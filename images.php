<?php
	$msg="";
	if(isset($_POST['upload'])){
		$target="ads/".basename($_FILES['image']['name']);
		$db = mysqli_connect("localhost","root","","login");
		$images = $_FILES['image']['name'];
		$title = $_POST['title'];
		$description = $_POST['description'];
		$category = $_POST['category'];
		$sql = "INSERT INTO ads(images, description,title,category) VALUES ('$images','$description','$title','$category');";
		mysqli_query($db,$sql);
		if(move_uploaded_file($_FILES['image']['name'],$target)){
				$msg = "image uploaded successfully";
		}else{
			$msg = "There was a problem uploading image";
		}
		
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Image Upload</title>
</head>

<body>
<div id = "content">
	<form method = "post" action = "images.php" enctype = "multipart/form-data">
		<input type = "hidden" name = "size" value = "1000000">
		<div>
			<input type = "file" name = "image">
		</div>
		<div>
			<textarea name = "description" cols="40" rows = "4" placeholder = "Write something" ></textarea>
		</div>
		<input type = "text" name = "title" placeholder = "Title">
		<input type = "text" name = "category" placeholder = "Category">
		<div>
			<input type = "submit" name = "upload" value = "uploadimage">
		</div>
			
	</form>
</div> 

</body>

</html>