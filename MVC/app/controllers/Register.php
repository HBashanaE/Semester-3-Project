<?php

class Register extends Controller{
    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->load_model('Users');
        $this->view->setLayout('default');
    }

    public function loginAction(){
        if($_POST){
            // form validation
            $validation = true;
            if($validation === true){
                $user = $this->UsersModel->findByUsername($_POST['username']);
                if($user && password_verify(Input::get('password'), $user->password)){
                    $remember = (isset($_POST['remember_me']) && Input::get('remember_me')) ? true : false;
                    $user->login($remember);
                    Router::redirect('');
                }
            }
        }
        $this->view->render('register/login');
    }
}
