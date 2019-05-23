<!DOCTYPE html>

<html>
<head>
	<title>Image Upload</title>
</head>
<style>
body{
    background: #aaa;
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
input[type=hidden]{
    background: #f2f2f2;

}
input[type=file]{
    width:400px;
}

</style>
<body>
<div id = "content">
    <h1 id = "head">POST YOUR ADD HERE</h1>
	<form method = "post" action = "images.php" enctype = "multipart/form-data">
		<input type = "hidden" name = "size" value = "1000000">
		<input type = "file" name = "image">
		<textarea name = "text" cols="40" rows = "4" placeholder = "Your Address" ></textarea>
        <input type = "text" name = "TNum" placeholder = "Telephone Number">
        <input type = "text" name = "Price" placeholder = "Your Price Rs:"></br>
		<input type = "submit" name = "upload" value = "uploadimage">
			
	</form>
</div> 

</body>
</html>