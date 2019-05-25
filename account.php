<?php
$name = $_GET['username'];
echo "User Name: ".$name."<br>";

//mysql_connect('localhost','root','');
//mysql_select_db('demo');

$conn =mysqli_connect("localhost","root","","login") or die ("Failed to connect");
$sql = "SELECT * FROM ads WHERE username='$name'";
$query=$conn->query($sql);
//WHERE username=$name

if($query->num_rows>0){
    while($col=$query->fetch_assoc()){
        echo "Title: ".$col["title"]."   Description: ".$col["description"];
    }
}
//echo $query;

/*
echo "<table border='1'>";
while ($row=mysql_fetch_assoc($result)){
    echo "<tr>";
    foreach ($row as $field => $value){
        echo "<td>".$value."</td>";
    }
    echo "</tr>";

}*/
$conn->close();

/*   query = "SELECT * FROM members(username,password,activated,mail) VALUES('username', 'password','1','email')";*/







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