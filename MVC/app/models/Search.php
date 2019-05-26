<?php

class Search extends Model{
 
    public function __construct($search=''){
        $table = 'advertisement';
        parent::__construct($table);
    }

    public function getSearchResultz($query,$category){
        // dnd(['conditions' => "advertisement = ?", 'bind' =>[$query." LIKE '%" . $query . "%' OR `description` LIKE '%" . $category . "%'"]]);
        return $this->find(['conditions' => "advertisement = ?", 'bind' =>[$query."LIKE '%" . $query . "%' OR `description` LIKE '%" . $query . "%'"]]);
    }
}