<?php
$mgs="";
    session_start();
    if (isset($_POST['submit_image'])) {
	if($_POST['submit_image']){
        $target = "ads/".basename($_FILES['myimage']['name']);
        $imagename=$_FILES["myimage"]["name"];
        $discription=$_POST["discription"];
        $title=$_POST["category"];
        include 'ad.php';
        $ad= new Ad();
        $ad->addPost($imagename,$discription, $title,$target);
    }
}

?>

<html>
<head>
    <title>upload</title>
    <link rel="stylesheet" href="style.css">
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
 <textarea name ="discription" cols="40" rows= "4" class="form-input" placeholder = "Discription"></textarea>
 </div>
 <div class= "form-group">
 <input type="file" class= "form-submit" name="myimage">
 </div>
 <div class= "form-group">
 <input type="submit" name="submit_image" class ="form-submit" value="Upload">
 </div>
 </div>
</form>

</body>
</html>