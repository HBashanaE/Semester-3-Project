<?php

class Home extends Controller{
    public function __construct($controller,$action)
    {
        parent::__construct($controller,$action);
    }

    public function indexAction(){
        $db = DB::getInstance();
        $fields =[
            'fname' => 'Bashana',
            'email' => 'hbashanae@yahoo.com'
        ];
        $contactsQ = $db->find('contacts', [
            'conditions' => ['fname = ?', 'lname = ?'],
            'bind' => ['Bashana', 'Elikewela'],
            'order' => "lname, fname",
            'limit' => 5
        ]);
        dnd($contactsQ);
        $this->view->render('home/Index');
    }

}