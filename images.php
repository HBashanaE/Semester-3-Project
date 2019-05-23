<?php
	$msg="";
	if(isset($_POST['upload'])){
		$target="alladds/".basename($_FILES['image']['name']);
		$db = mysqli_connect("localhost","root","","login");
		$image = $_FILES['image']['name'];
		$text = $_POST['text'];
		$TNum = $_POST['TNum'];
		$Price = $_POST['Price'];
		$list = $_POST['list1'];
		if ($image!=Null and $text!=NUll and strlen($TNum)==10 and $Price!=Null and $list!=Null){
			$sql = "INSERT INTO alladds(image,catagory, text,price,pnum) VALUES ('$image','$list','$text','$Price','$TNum');";
			mysqli_query($db,$sql);
		}
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
body{
    background: #c0c0cc;
}
#content{
	width:500px;
	margin:20px auto;
	border: 1px solid #cbcbcb;
    padding:20px;
    font-size:20px;
    background:#7a7cbb;
}
h1{
    text-align:center;
}
input[type=text]{
    width:486px;
    padding:5px;
    font-size:17px;
}
input[type=submit]{
    width:500px;
    padding:5px;
    font-size:18px;
    margin-top:5px;
}
textarea{
    background: #f2f2f2;
    width:492px;
    font-size:20px;
    margin:auto;
    margin-top:5px;
}
input[name=size]{
    background: #f2f2f2;
	width:400px;

}
input[type=file]{
	border:1px solid black;
    background: #c0c0cc;
	width: 495px;
	align:right;
	font-size:15px;
	font-family:Times;
}
#notify{
	color:black;
	font-size:30px;
	background:green;
	text-align:center;
}
#notify1{
	color:black;
	font-size:25px;
	background:red;
	text-align:center;
}
#notify2{
	color:black;
	font-size:30px;
	background:green;
	text-align:center;
}
select{
	width:497px;
	align:center;
	height:30px;
	margin-top:5px;
	font-family:Times;
	font-size:20px;
}
</style>
<body>
<div id = "content">
    <h1 id = "head">POST YOUR ADD HERE</h1>
	<form method = "post" action = "images.php" enctype = "multipart/form-data">
		<input type = "hidden" name = "size" value = "1000000">
		<input type = "file" name = "image">
		<select name= 'list1' >
			<option value = ''>Select Your Category</option> 
            <option value = 'Electrical'>Electrical</option>
            <option value = 'clean'>Cleaning</option>
            <option value = 'tent'>Tent</option>
        </select>
		</br>
		<textarea name = "text" cols="40" rows = "4" placeholder = "Your Address" ></textarea>
        <input type = "text" name = "TNum" placeholder = "Telephone Number" value = "">
        <input type = "text" name = "Price" placeholder = "Your Price Rs:">
		<input type = "submit" name = "upload" value = "uploadimage">
			
	</form>
	<?php
		$tnum = $_POST["TNum"];
		$cat = $_POST['list1'];
		if(strlen($tnum)!=10){
			echo"<div id ='notify1'>";
				echo "There is an Error on your phone number!";
			echo "</div>";
			
		}
		if($cat==Null){
			echo"<div id ='notify2'>";
				echo "Add your catagory!!";
			echo "</div>";
		}
		else if ($image!=Null and $text!=NUll and strlen($TNum)==10 and $Price!=Null and $cat!=Null){
			echo "<div id ='notify'>";
				echo "image is successfully uploaded!";
			echo "</div>";
		}
		
		
	?>
</div> 

</body>
</html>