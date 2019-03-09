<?php
$mgs="";
    session_start();
    if (isset($_POST['submit_image'])) {
	if($_POST['submit_image']){
        $target = "myimage/".basename($_FILES['myimage']['name']);
        $imagename=$_FILES["myimage"]["name"];
        $text=$_POST["text"];
        /*$imagetmp=addslashes (file_get_contents($_FILES['myimage']['tmp_name']));*/
        $db = mysqli_connect("localhost", "root", "", "login") or die ("Failed to connect");
        $query = "INSERT INTO ads(id,title,description,image) VALUES('1','say','$text','$imagename')";
        mysqli_query($db,$query);
        
        if (move_uploaded_file($_FILES['myimage']['tmp_name'],$target)){
            $mgs= "image uploaded successfully";

        }else{
            $mgs = "image uploaded unssuccessfully";
        }
    }
}

?>

<html>
<head>
    <title>upload</title>
</head>
<body>
<div>	 	
<form method="POST" action="upload.php" enctype ="multipart/form-data">
 <input type="hidden" name ="size" value="1000000">
 <div>
 <input type="file" name="myimage">
 </div>
 <div>
 <textarea name ="text" cols="40" rows= "4" placeholder = "Say something about thie ad"></textarea>
 </div>
 <div>
 <input type="submit" name="submit_image" value="Upload">
 </div>
 </div>
</form>

</body>
</html>