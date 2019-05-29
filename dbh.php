<?php

    class dbh {

        private $servername;
        private $username;
        private $password;
        private $dbname;
        private static $instance;

        private function __construct(){

        }

        public function connect(){
            $this->servername = "localhost";
            $this->username = "root";
            $this->password = "";
            $this->dbname = "login";

            $conn =mysqli_connect($this->servername,$this->username,$this->password,$this->dbname) or die ("Failed to connect");

            return $conn;
            
        }

        public static function getDataBase(){
            if(!isset(self::$instance)){
                self::$instance = mysqli_connect("localhost","root","","login") or die ("Failed to connect");
            }
            return self::$instance;
        }
        

        public static function saveToDatabase($username,$password,$email){
            
           // if (password_verify($cpassword,$password)){
                $db = self::getDataBase(); 
                $query = "INSERT INTO members(username,password,activated,mail) VALUES('$username', '$password','1','$email')";
                $result = mysqli_query($db,$query);
                if($result) {
                    echo "Succesfully registered";
                    header('Location: index.php');
                }else {
                    $sql = "SELECT * FROM members WHERE username='$username'";
                    if(mysqli_query($db,$sql)){
                        echo '<script> userNameError() </script>';
                    }else{
                        echo "Failed to register";
                    }
                }
            //}else{
            //    echo "passwords do not match";
            //}


        }
    }

    class proxydb {

        private function __construct(){

        }

        public static function saveToDatabase($username,$password,$email,$cpassword){
            if (password_verify($cpassword,$password)){
                dbh::saveToDatabase($username,$password,$email);
            
            }
            else{
                echo "passwords do not match";
            }
        
        } 
    }

?>