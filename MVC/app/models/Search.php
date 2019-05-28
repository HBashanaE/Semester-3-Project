<?php

class Search extends Model{
 
    public function __construct($search=''){
        $table = 'advertisement';
        parent::__construct($table);
    }

    public function getSearchResult($keyword,$category=''){
        // dnd(['conditions' => "((title LIKE ?) OR (description LIKE ?) ", 'bind' =>[$keyword]]);
        if($category == 'All'){
            return $this->getSearchResultz(['conditions' => "((title LIKE ?) OR (description LIKE ?) ", 'bind' =>[$keyword]]);
        }else{
            return $this->getSearchResultz(['conditions' => "(title ? OR description ?) AND (category = ?)", 'bind' =>[$keyword,$keyword,$category]]);
        }
        
        // return $this->getSearchResult(['conditions' => "((title LIKE ?) OR (description LIKE ?) AND (category = ?)", 'bind' =>[$keyword,$category]]);
    }
}