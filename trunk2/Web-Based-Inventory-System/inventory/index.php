<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of products
 *
 * @author ronversa09
 */
require_once '../config/config.php';

class Index extends Controller {
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
            $this->template->setContent('product_dashboard.tpl');
            $this->template->setPageName("Product Page");
            
            $this->template->assign('AddEdit_products_file', 'add_product.tpl');
            
            $this->category_model->getCategory();
            $this->template->assign('array_category_id1', $this->category_model->category_id);
            $this->template->assign('array_category_name1', $this->category_model->category_name); 
            
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
        $this->product_model->filter($searchName, $page);
        
        $numOfPages                 = $this->product_model->getQueryPageSize($searchName);
        $numOfResults               = count($this->product_model->product_name);
        $getListof_product_name     = $this->getListofName($this->product_model->product_name, $searchName, $finder);
        $getListof_product_id       = $this->product_model->product_id;
        $getListof_category_name    = $this->product_model->category_name;
        $getListof_quantity         = $this->product_model->quantity;
        
        $this->template->assign('array_product_id', $getListof_product_id);
        $this->template->assign('array_product_name', $getListof_product_name);
        $this->template->assign('array_category_name', $getListof_category_name);
        $this->template->assign('array_quantity', $getListof_quantity);
        
        $this->template->assign('product_length', $numOfPages);
        $this->template->assign('rowCount_product', $numOfResults);
        $this->template->assign('search_value', $searchName);        
        
        if ($numOfResults == 0) {
            $this->template->setAlert('No Results Found.', Template::ALERT_ERROR, 'alert');
        }
    }
    
    /*---------------------------------------------*/
    public function delete($selected) {
        $explode = explode("-", $selected);
        foreach ($explode as $value) {
            $this->product_model->delete(trim($value));
        }
        $HOST = $explode[0] != null ? HOST ."/inventory/index.php?action=deleted" : HOST ."/inventory/index.php";
        header('Location: ' .$HOST);
    }
    
    public function deleted(){
        $this->template->setAlert('Delete an Product Successfully!..', Template::ALERT_SUCCESS, 'alert');
    }
    
    /*---------------------------------------------*/
    public function add_product(){
        $this->product_model->insert(trim($_POST['product_name']), $_POST['category'], trim($_POST['quantity']));
        
        $this->template->setAlert('Successfully Added Product!..', Template::ALERT_SUCCESS, 'alert');
        $this->displayTable('', 1, "default");       
    }
    
    /*---------------------------------------------*/
    public function edit_product($key){
        $this->template->assign('AddEdit_products_file', 'edit_product.tpl');
        $this->product_model->getProduct_Info($key);
        
        $this->template->assign('pre_product_name', $this->product_model->product_name);
        $this->template->assign('pre_category_name', $this->product_model->category_name);
        $this->template->assign('pre_quantity', $this->product_model->quantity);
        
        
        if(isset($_POST['edit_product'])){
            $this->product_model->edit($key, trim($_POST['product']), $_POST['category'], trim($_POST['quantity']));
            $this->template->setAlert('Successfully Edited Product!..', Template::ALERT_SUCCESS, 'alert');
            $this->displayTable('', 1, "default");       
        }
        
    }
    
    
    
    
    
    public function display() {
        $this->template->display('bootstrap.tpl');
    }
}

$controller = new Index();
$controller->perform_actions();
$controller->display();
?>
