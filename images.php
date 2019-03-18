<?php
	$msg="";
	if(isset($_POST['upload'])){
		$target="alladds/".basename($_FILES['image']['name']);
		$db = mysqli_connect("localhost","root","","login");
		$image = $_FILES['image']['name'];
		$text = $_POST['text'];
		$TNum = $_POST['TNum'];
		$Price = $_POST['Price'];
		$sql = "INSERT INTO alladds(image, text,price,pnum) VALUES ('$image','$text','$TNum','$Price');";
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
<style>
#content{
	width:50%;
	margin:20px auto;
	border: 1px solid #cbcbcb;
}
form{
	width:50%;
	margin:20px auto;
}
form div{
	margin-top:5px;
}
#img_div{
	width:80%;
	padding:5px;
	margin:15px auto;
	border: 1px solid #cbcbcb;
}

</style>
<body>
<div id = "content">
	<form method = "post" action = "images.php" enctype = "multipart/form-data">
		<input type = "hidden" name = "size" value = "1000000">
		<div>
			<input type = "file" name = "image">
		</div>
		<div>
			<textarea name = "text" cols="40" rows = "4" placeholder = "say something about this photo" ></textarea>
		</div>
		<input type = "text" name = "TNum" placeholder = "Telephone Number">
		<input type = "text" name = "Price" placeholder = "Your Price">
		<div>
			<input type = "submit" name = "upload" value = "uploadimage">
		</div>
			
	</form>
</div> 

</body>

</html>