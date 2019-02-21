<?php
//$connection = mysqli_connect('localhost', 'root', '');
$connection = new mysqli('localhost','root','')
//$connection = new PDO('mysql:host=localhost;dbname=dbname', 'username', 'password');
//if (!$connection){
//    die("Database Connection Failed" . mysqli_error($connection));
//}
//$select_db = mysqli_select_db($connection, 'mashlog_demo');
$select_db = $connection->query("SELECT lastname FROM employees");
// if (!$select_db){
//     die("Database Selection Failed" . mysqli_error($connection));
// }