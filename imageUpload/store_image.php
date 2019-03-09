<?php
$host = 'localhost';
$user = 'root';
$pass = ' ';

mysql_connect($host, $user, $pass);

mysql_select_db('demo');

$upload_image=$_FILES[" myimage "][ "name" ];

$folder="/xampp/htdocs/images/";

move_uploaded_file($_FILES[" myimage "][" tmp_name "], "$folder".$_FILES[" myimage "][" name "]);

$insert_path="INSERT INTO image_table VALUES('$folder','$upload_image')";

$var=mysql_query($inser_path);
?>