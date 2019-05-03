<?php

class UserSessions extends Model{
    public function __construct(){
        $table = 'user_sessions';
        parent::__construct($table);
    }
}