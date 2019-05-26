<?php

define('DS',DIRECTORY_SEPARATOR);
define('ROOT',dirname(__FILE__)); 
//load configurations and helper functions
require_once(ROOT.DS.'config'.DS.'config.php');
require_once(ROOT.DS.'app'.DS.'lib'.DS.'helpers'.DS.'functions.php');

//Autoload classes
function autoload($className){
    if(file_exists(ROOT.DS.'core'.DS.$className.'.php')){
        require_once(ROOT.DS.'core'.DS.$className.'.php');
    }elseif(file_exists(ROOT.DS.'app'.DS.'controllers'.DS.$className.'.php')){
        require_once(ROOT.DS.'app'.DS.'controllers'.DS.$className.'.php');
    }elseif(file_exists(ROOT.DS.'app'.DS.'models'.DS.$className.'.php')){
        require_once(ROOT.DS.'app'.DS.'models'.DS.$className.'.php');
    }
}

spl_autoload_register('autoload');
session_start();
$url = isset($_SERVER['PATH_INFO']) ? explode('/',ltrim($_SERVER['PATH_INFO'],'/')) :[];
$db = DB::getInstance();
//require_once(ROOT.DS.'core'.DS.'bootstrap.php');

// dnd(COOKIE::exist(REMEMBER_ME_COOKIE_NAME));
// dnd(isset($_COOKIE['lsdjfLjkfdshjKJFHoid']));
// dnd(Session::exist(CURRENT_USER_SESSION_NAME));
// dnd(isset($_SESSION['JHfjkhweIufbJKNf']));
if(!Session::exist(CURRENT_USER_SESSION_NAME) && COOKIE::exist(REMEMBER_ME_COOKIE_NAME)){
    // dnd("This is working");
    Users::loginUserFromCookie();
}
//Route the request
Router::route($url);