<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of category
 *
 * @author ronversa09
 */

require_once '../config/config.php';
class category extends Controller {
    //put your code here
    private $template;
    private $product_model;
    private $category_model;
    
     public function __construct() {
        parent::__construct();
        $this->template         = new Template();
        $this->product_model    = new product_model();
        $this->category_model   = new category_model();
        
        if(Session::user_exist()){
            $this->template->assign('user_exist', Session::user_exist());
            $this->template->assign('name', "" .Session::get_surname() .", " .Session::get_firstname() ." "  .Session::get_middle_initial() .".");
            $this->template->setContent('category_dashboard.tpl');
            $this->template->setPageName("Category Page");  
            
            
            $this->template->assign('AddEdit_category_file', 'add_category.tpl');
            $this->displayTable('', 1, "default");    
        }else{
            header("Location: ". HOST ."/index.php?action=login_error");
        }      
     }
     
     /*---------------------------------------------*/
    public function search_filtering($search){
        $this->displayTable($search, 1);
    }
    
     public function displayTable($searchName, $page, $finder){
        $this->category_model->filter($searchName, $page);
        
        $numOfPages                 = $this->category_model->getQueryPageSize($searchName);
        $numOfResults               = count($this->category_model->category_name);
        $getListof_category_name    = $this->getListofName($this->category_model->category_name, $searchName, $finder);
        $getListof_category_id      = $this->category_model->category_id;
        
        $this->template->assign('array_category_id', $getListof_category_id);
        $this->template->assign('array_category_name', $getListof_category_name);
        
        $this->template->assign('category_length', $numOfPages);
        $this->template->assign('rowCount_category', $numOfResults);
        $this->template->assign('search_value', $searchName);        
        
        if ($numOfResults == 0) {
            $this->template->setAlert('No Results Found.', Template::ALERT_ERROR, 'alert');
        }
    }
    
    /*---------------------------------------------*/
    public function delete($selected) {
        $explode = explode("-", $selected);
        foreach ($explode as $value) {
            $this->category_model->delete(trim($value));
        }
        $HOST = $explode[0] != null ? HOST ."/inventory/category.php?action=deleted" : HOST ."/inventory/category.php";
        header('Location: ' .$HOST);
    }
    
    public function deleted(){
        $this->template->setAlert('Delete an Product Successfully!..', Template::ALERT_SUCCESS, 'alert');
    }
    
    /*---------------------------------------------*/
    public function add_category(){
        if(isset($_POST['add_category'])){
            $this->category_model->insert(trim($_POST['category_name']));
            $this->template->setAlert('Successfully Added Category!..', Template::ALERT_SUCCESS, 'alert');
            $this->displayTable('', 1, "default");       
        }
    }
    
    /*---------------------------------------------*/
    public function edit_category($key){
        $this->template->assign('AddEdit_category_file', 'edit_category.tpl');
        $this->category_model->getCategory_Info($key);
        $this->template->assign('pre_category_name', $this->category_model->category_name);
        
        if(isset($_POST['edit_category'])){
            $this->category_model->edit($key, trim($_POST['category_name']));
            $this->template->setAlert('Successfully Edited Category!..', Template::ALERT_SUCCESS, 'alert');
            $this->displayTable('', 1, "default");       
        }
    }
     
     
    public function display() {
        $this->template->display('bootstrap.tpl');
    }
}


$controller = new category();
$controller->perform_actions();
$controller->display();
?>
