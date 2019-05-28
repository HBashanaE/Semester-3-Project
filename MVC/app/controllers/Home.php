<?php
if(isset($_POST['query']) && isset($_POST['category'])){
    header('Location: ' .PROOT. 'home/search/'.$_POST['category'].'/'.$_POST['query']);  
}
class Home extends Controller{

    
    public function __construct($controller,$action)
    {
        parent::__construct($controller,$action);
        $this->load_model('Users');
        $this->load_model('Search');
        $this->view->setLayout('default');
    }

    public function indexAction(){
        $this->view->render('home/Index');
    }

    public function loginAction(){
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
        $this->view->render('register/login');
    }

    public function logoutAction(){  
        if(currentUsers()){
            currentUsers()->logout();
        }
        Router::redirect('home/index');
    }

    public function searchAction($category,$keyword){
    
        // "SELECT * FROM ads WHERE ((`title` LIKE '%" . $query . "%') OR (`description` LIKE '%" . $query . "%')) AND (category='$categoryDigit')";
        // $searchResult = $this->SearchModel->getSearchResult(['conditions' => "((title LIKE ?) OR (description LIKE ?) AND (category = ?)", 'bind' =>[$keyword,$category]]);
        $searchResult = $this->SearchModel->getSearchResult($keyword,$category);
        dnd($searchResult);

    }

}