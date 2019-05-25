<?php

class DB{
    private static $instance;

    private function __construct(){
    }

    public static function getInstance(){
        if(!isset($instance)){
            $instance = mysqli_connect(host,username,password,dbname) or die ("Failed to connect");
        }
        return $instance;
    }

}