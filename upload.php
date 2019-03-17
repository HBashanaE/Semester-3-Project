<?php
$mgs="";
    session_start();
    if (isset($_POST['submit_image'])) {
	if($_POST['submit_image']){
        $target = "myimage/".basename($_FILES['myimage']['name']);
        $imagename=$_FILES["myimage"]["name"];
        $text=$_POST["text"];
        $title=$_POST["category"];
        /*$db = mysqli_connect("localhost", "root", "", "login") or die ("Failed to connect");
        $query = "INSERT INTO ads(title,description,image) VALUES('$title','$text','$imagename')";
        mysqli_query($db,$query);
        
        if (move_uploaded_file($_FILES['myimage']['tmp_name'],$target)){
            $mgs= "image uploaded successfully";

        }else{
            $mgs = "image uploaded unssuccessfully";
        }*/
        include 'ad.php';
        $ad= new Ad();
        $ad->addPost($imagename,$text, $title,$target);
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
    <div >
        
        <select type = "text" name= "category">
            <option>Select Category</option>
            <option>Vehicles</option>
            <option>Cleaning appliences</option>
            <option>Electrical/Electronic</option>
            <option>Catering</option>
            <option>Building and construction</option>
            <option>Other</option>
        </select>
    </div>
 <div>
 <textarea name ="text" cols="40" rows= "4" placeholder = "Discription"></textarea>
 </div>
 <div>
 <input type="file" name="myimage">
 </div>
 <div>
 <input type="submit" name="submit_image" value="Upload">
 </div>
 </div>
</form>

</body>
</html>