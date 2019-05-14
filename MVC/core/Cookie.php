<?php

class Cookie{

    public static function set($name, $value, $expiry){
        if(setcookie($name, $value, time()+$expiry, '/')){
            return true;
        }
        return false;
    }

    public static function delete($name){
        self::set($name, '', time() -1);
    }

    public static function get($name){
        return $_COOKIE[$name];
    }

    public static function exist($name){
        return isset($_COOKIE[$name]);
    }
}