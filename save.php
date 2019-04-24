<?php

    $servername = "localhost";
    $username = "root";
    $password ="";
    $dbname ="login";

    //  $conn = new mysql($servername,$username,$password,$dbname); //create connection
    $conn =  mysqli_connect($servername,$username,$password,$dbname);

    if ($conn->connect_error) {
        die ("Connection failed : ". $conn->connect_error);   //create connection
    }

    $sql = "SELECT id, title, discription, image FORM ads";
    $result =$conn-> query($sql);

    if ($result->num_rows >0 ){
        while ($row = $result->fetch_assoc()){
            echo "id : " .$row["id"]. "title : " .$row["title"]. "discription : " .$row["discription"]. "image :" .$row["image"]."<br>";

        }

    }else{
        echo "0 results";
    }
    $conn->close();

    
?>