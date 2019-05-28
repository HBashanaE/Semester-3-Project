
<?php
    include 'dbh.php';
    class Ad{
        
        public function addPost($username,$imagename, $text,$category, $title,$target){
            $db= dbh::getDataBase();
            $query = "INSERT INTO ads(username,title,description,category,image,approve) VALUES('$username','$title','$text','$category','$imagename','disapprove')";
            mysqli_query($db,$query);
            
            if (move_uploaded_file($_FILES['myimage']['tmp_name'],$target)){
                $mgs= "image uploaded successfully";
                header('Location: index.php');
                
    
            }else{
                $mgs = "image uploaded unssuccessfully";
            }
        }

        public function addOne($id){
            $db= dbh::getDataBase();
            $sql = "UPDATE ads SET approve= 'approve'  WHERE id='$id'";
            mysqli_query($db,$sql);
           if (mysqli_query($db,$sql)){
            header('Location: loadimage.php');
           }else{
               echo "bye";
           }
        }

    }

?>