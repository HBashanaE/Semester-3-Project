<?php
class User{

    private $username = "User";
    private $email;
    private $password = "password";
    private $ads = array();

    public function __construct($username, $email, $password){
        echo "this class " . __CLASS__ . " created<br>";
        $this->$username = $username;
        $this->email = $email;
        $this->$password = $password;
    }
    public function getUsername(){
      return $this->username ;
    }
    public function getPassword(){
        return $this->password;
      }
      public function getEmail(){
        return $this->email ;
      }
}
?>