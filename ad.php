
<?php
    include 'test.php';
    class Ad{
        
        public function addPost($imagename, $text, $title,$target){
            $c=new dbh();
            $db= $c->connect();
            $query = "INSERT INTO ads(title,description,image) VALUES('$title','$text','$imagename')";
            mysqli_query($db,$query);
            
            if (move_uploaded_file($_FILES['myimage']['tmp_name'],$target)){
                $mgs= "image uploaded successfully";
    
            }else{
                $mgs = "image uploaded unssuccessfully";
            }
        }

    }



?>