
<?php
    include 'test.php';
    class Ad{
        
        public function addPost($imagename, $text, $title,$target){
            $c=new dbh();
            $db= $c->connect();
            $query = "INSERT INTO ads(title,description,image,approve) VALUES('$title','$text','$imagename','disapprove')";
            mysqli_query($db,$query);
            
            if (move_uploaded_file($_FILES['myimage']['tmp_name'],$target)){
                $mgs= "image uploaded successfully";
                header('Location: index.php');
    
            }else{
                $mgs = "image uploaded unssuccessfully";
            }
        }

        public function addOne($id){
            $c=new dbh();
            $db= $c->connect();
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