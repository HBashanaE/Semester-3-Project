<?php
$mgs="";
session_start();
$username = $_SESSION['username']

?>
<!DOCTYPE html>
<html>

<head>
<title>Reviwe images</title>
<link rel="shortcut icon" href="Resources/favicon.ico">
<!-- <link href="uploadstyle.css" rel="stylesheet"> -->
    <!-- Bootstrap CDN-->
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
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<nav class="navbar navbar-dark bg-dark justify-content-between">
    <a class="navbar-brand">
        <img classs="img-responsive" width="" height="75px" src="Resources/Kuliyata_logo_full.png">
    </a>
    </nav>
<div>
<script type=text/javascript>
async function sendData(id){
    let form = new FromData();
    form.append('id',id);
    let re = await fetch("ad1.php",{
        method: "POST",
        body: form
    });
}
</script>
        <!--<div class="container">
        <h2 class="form-title"> Wellocme Back <?php echo $username ?></h2>
 -->   <?php
         include_once('dbh.php');
         $db = dbh::getDataBase();
        // $sql= "SELECT * FROM ads";
        // $result= mysqli_query($db,$sql);
        // while ($row=mysqli_fetch_array($result)){
        //     if ($row['approve']!='approve'){
        //     echo "<div class = 'container'>";
        //      echo "<form method='POST' action='loadimage.php' enctype ='multipart/form-data'>";
        //         echo "<img src='ads/".$row['image']."' class ='img-thumbnail' alt = 'Responsive image' style ='width : 500px ; height:500px;'>";
        //         echo "<p>".$row['description']. "</p>";
        //         echo "<input type='submit' name='submit_image' class = 'button' : hover  onclick=confirm(" . $row['id'] . ") value='Approve'>";
        //     echo "</form>";
        //     echo "</div>";
        //session_start();
        
        //$db=mysqli_connect("localhost" , "root", "", "login");
        $sql= "SELECT * FROM ads";
        $result= mysqli_query($db,$sql);
        while ($row=mysqli_fetch_array($result)){
            if ($row['approve']!='approve'){
            echo "<div class = 'container'>";
             echo "<form method='POST' action='loadimage.php' enctype ='multipart/form-data'>";
                echo "<img src='ads/".$row['image']."' class ='img-thumbnail' alt = 'Responsive image' style ='width : 500px ; height:500px;'>";
                echo '<pre class="card-text">'.$row['description'].'</pre>';
                echo '<h3 class="card-text">Posted by: '.$row['username'].'</h3>';
                echo '<h5 class="card-text">Posted by: '.$row['telephone'].'</h5>';
                echo "<pre></pre>";
                echo '<h6 class="card-text">Posted on: '.$row['date'].'</h6>';
                echo "<input type='submit' name='submit_image' class = 'btn btn-primary' onclick=confirm(" . $row['id'] . ") value='Approve'>";
               // echo "<input type='submit' name='submit_image' class = 'button' : hover  onclick=confirm(" . $row['id'] . ") value='Approve'>";
                echo "</form>";
            echo "</div>";
            
            /*
            $id=$row['id'];
            if (isset($_POST['submit_image'])) {
                if($_POST['submit_image']){
                    $approve="approve";
                    include 'ad.php';
                    $ad= new Ad();
                    $ad->addOne($id);
             
                }
        
            }*/

        }
    }

    ?>
</div>
<script>
    function a(val) {
      clicked = val;
      console.log(val);
      // $("#confirmationModal").modal();

    }

    async function confirm(id) {


let form = new FormData();
form.append("id", id);

let res = await fetch("ad1.php", {
  method: "POST",
  body: form

});
let t = await res.text();
console.log(t);
location.reload();



}
</script>
                
</body>

</html>