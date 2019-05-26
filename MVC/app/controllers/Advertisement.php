<?php

class Advertisement extends Controller{
    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->load_model('Post');
        $this->view->setLayout('default');
    }

    public function indexAction(){
        
        $this->view->render('advertisement/index');
    }

    public function postAction(){
        $validation = new Validate();
        if($_POST){
            // form validation
            $validation->check($_POST, [
                'username' => [
                    'display' => "Username",
                    'required' => true
                ],
                'password' => [
                    'display' => 'Password',
                    'required' => true,
                    'min' => 6
                ]
            ]);
            if($validation->getPassed()){
                $user = $this->UsersModel->findByUsername($_POST['username']);
                if($user && password_verify(Input::get('password'), $user->password)){
                    $remember = (isset($_POST['remember_me']) && Input::get('remember_me')) ? true : false;
                    $user->login($remember);
                    Router::redirect('');
                }else{
                    $validation->addError("There is an error with your username or password");
                }
            }
        }
        $this->view->displayErrors = $validation->displayErrors();
        $this->view->render('advertisement/post');
    }

    
}
