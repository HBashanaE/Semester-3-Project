<?php
//load configurations and helper functions
require_once(ROOT.DS.'config'.DS.'config.php');
require_once(ROOT.DS.'app'.DS.'lib'.DS.'helpers'.DS.'functions.php');

//Autoload classes
function __autoload($className){
    if(file_exists(ROOT.DS.'core'.DS.$className.'.php')){
        require_once(ROOT.DS.'core'.DS.$className.'.php');
    }elseif(file_exists(ROOT.DS.'app'.DS.'controllers'.DS.$className.'.php')){
        require_once(ROOT.DS.'app'.DS.'controllers'.DS.$className.'.php');
    }elseif(file_exists(ROOT.DS.'app'.DS.'models'.DS.$className.'.php')){
        require_once(ROOT.DS.'app'.DS.'models'.DS.$className.'.php');
    }
}

//Route the request
Router::route($url);