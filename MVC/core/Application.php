<?php
class Application{
    public function __construct()
    {
        $this->set_reporting();
        $this->unregister_globals();
    }

    private function _set_reporting(){
        if(DEBUG){
            error_reporting(E_ALL);
            ini_set('display_errors',1);
        }else{
            error_reporting(E_ALL);
            ini_set('display errors',0);
            ini_set('log_errors',1);
            ini_set('error_log',ROOT.DS.'tmp'.DS.'logs'.DS.'errors.log');
        }
    }

    private function _unregister_globals(){
        if(ini_get('register_globals')){
            $globalAry = ['_SESSION','_COOCKE','_POST','_GET','_REQUEST','_SERVER','_ENV'];
            foreach($globalAry as $g){
                foreach($GLOBALS[$g] as $k => $v){
                    if($GLOBALS[$k]===$v){
                        unset($GLOBALS[$k]);
                    }
                }
            }
        }
    }
}