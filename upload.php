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
        $username=session["$username"];
    }
}

?>

<html>
<head>
    <title>upload</title>
    <link href="uploadstyle.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="Resources/dist/css/jquery.dm-uploader.min.css" rel="stylesheet">
    <link href="Resoures/styles.css" rel="stylesheet">
    <script src="Resources/fileUploader/dropzone.js"></script>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark justify-content-between">
    <a class="navbar-brand">
        <img classs="img-responsive" width="" height="75px" src="Resources/Kuliyata_logo_full.png">
    </a>
    </nav>
        
<div>	 	
    <form method="POST" action="upload.php" enctype ="multipart/form-data">
    <input type="hidden" name ="size" value="1000000">
    <div class ="col-lg-5 col-md-5 col-sm-12 p-2" >
        
        <select type = "text" class="form-control search-slt" name= "category" id="selectCategory">
            <option>Select Category</option>
            <option>Vehicles</option>
            <option>Cleaning appliences</option>
            <option>Electrical/Electronic</option>
            <option>Catering</option>
            <option>Building and construction</option>
            <option>Other</option>
        </select>
    </div>

 <div >
 <input type="file" class= "form-submit" name="myimage">
 </div>
 <div>
 <textarea name ="text" cols="40" rows= "4"  placeholder = "Discription"></textarea>
 </div>
 <div>
 <input type="submit" name="submit_image" class = "button" : hover value="Upload">
 </div>
 </div>
</form>

</body>
</html>