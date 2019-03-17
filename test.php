<?php

    class dbh {

        private $servername;
        private $username;
        private $password;
        private $dbname;

        public function connect(){
            $this->servername = "localhost";
            $this->username = "root";
            $this->password = "";
            $this->dbname = "login";

            $conn =mysqli_connect($this->servername,$this->username,$this->password,$this->dbname) or die ("Failed to connect");

            return $conn;
            
        }

        public function saveToDatabase($username,$password,$email,$cpassword){
            
            if ($password==$cpassword){
                $c=new dbh();
                $db = /*mysqli_connect("localhost", "root", "", "login")*/ $c->connect(); 
                $query = "INSERT INTO members(username,password,activated,mail) VALUES('$username', '$password','1','$email')";
                $result = mysqli_query($db,$query);
                if($result) {
                    echo "Succesfully registered";
                    header('Location: index.php');
                }else {
                    echo "Failed to register";
                }
            }else{
                echo "password wrong";
            }


        }
    }

?>