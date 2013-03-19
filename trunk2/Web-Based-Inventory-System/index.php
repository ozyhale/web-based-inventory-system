<?php
require_once 'config/config.php';

class Index extends Controller {
    private $template;
    private $user_model;
    
    public function __construct() {
        parent::__construct();
        $this->template = new Template();
        $this->user_model = new User_Model();
        
        $this->template->setPageName("Home");
        $this->template->setContent("login.tpl");  
    }
    
    public function login(){
        if($this->user_model->isUser_Exist(trim($_POST['username']), md5(trim($_POST['password'])))){            
            $this->user_model->getUserInfo(trim($_POST['username']));
            
            Session::set_username(trim($_POST['username']));
            Session::set_password(md5(trim($_POST['password'])));
            Session::set_firstname($this->user_model->fisrtname);
            Session::set_surname($this->user_model->lastname);
            Session::set_middle_initial($this->user_model->middle_initial);
            
            header("Location: ". HOST ."/inventory/");
            
            //var_dump(Session::user_exist());
        }else{
            header("Location: ". HOST ."/index.php?action=login_error");
        }
    }
    
    public function login_error(){
        $this->template->setPageName("Home");
        $this->template->setContent("login.tpl");
        $this->template->setAlert("Username or Password did not exist in database!!.. ", Template::ALERT_ERROR);
    }
    
    public function logout(){
        $this->template->setPageName("Home");
        $this->template->setContent("login.tpl");
        $this->template->setAlert("Successfully Logout!!.. ", Template::ALERT_SUCCESS);
        Session::destroy();
    }
    
    
    public function display() {
        $this->template->display('bootstrap.tpl');
    }
    
}


$controller = new Index();
$controller->perform_actions();
$controller->display();
?>