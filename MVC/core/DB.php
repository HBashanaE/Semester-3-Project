<?php

class DB{
    private static $_indtance = null;
    private $_pdo,$_query,$_error = false,$_result,$_count = 0, $_lastInsterID = null;

    private function __construct(){
        try{
            $this->_pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PASSWORD);
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public static function getInstance(){
        if(!isset(self::$_indtance)){
            self::$_indtance = new DB();
        }
        return self::$_indtance;
    }

    public function query($sql,$params = []){
        $this->_error = false;
        if($this->_query =$this->_pdo->prepare($sql)){
            $x =1;
            if(count($params)){
                foreach($params as $param){
                    $this->_query->bindValue($x,$param);
                    $x++;
                }
            }
        }

        if($this->_query->execute()){
            $this->_result = $this->_query->fetchALL(PDO::FETCH_OBJ);
            $this->_count = $this->_query->rowCount();
            $this->_lastInsterID = $this->_pdo->lastInsertId();
        }else{
            $this->_error = true;

        }
        return $this;
    }

    public function insert($table, $fields = []){
        $fieldString = '';
        $valueString = '';
        $vlaues = [];

        foreach ($fields as $field=> $value){
            $fieldString .= '`'.$field.'`,';
            $valueString .= '?,';
            $values[] = $value;
        }

        $fieldString = rtrim($fieldString, ',');
        $valueString = rtrim($valueString, ',');
        $sql = "INSERT INTO {$table} ({$fieldString}) VALUES ({$valueString})";
        if(!$this->query($sql, $values)->getError()){
            return true;
        }
        return false;
    }

    public function getError(){
        return $this->_error;
    }
}