<?php

    class dbh {

        private $servername;
        private $username;
        private $password;
        private $dbname;
        private static $instance;

        public function connect(){
            $this->servername = "localhost";
            $this->username = "root";
            $this->password = "";
            $this->dbname = "login";

            $conn =mysqli_connect($this->servername,$this->username,$this->password,$this->dbname) or die ("Failed to connect");

            return $conn;
            
        }

        public static function getDataBase(){
            if(!isset($this->instance)){
                $this->instance = mysqli_connect("localhost","root","","login") or die ("Failed to connect");
            }
            return $this->instance;
        }

        public function saveToDatabase($username,$password,$email,$cpassword){
            
            if (password_verify($cpassword,$password)){
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
                echo "passwords do not match";
            }


        }
    }

?>