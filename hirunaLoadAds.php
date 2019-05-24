<?php
$name = $_GET['username'];
echo $name;
mysql_connect('localhost','root','');
mysql_select_db('demo');








/*
class LoginDatabaseHandler{
    private $servername;
    private $username;
    private $password;
    private $database;
    
    protected function connect(){
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->database = "login";

        $conn = new mysqli($this->servername, $this->username, $this->password, $this->database);

        return $conn;
    }

}*/
?>