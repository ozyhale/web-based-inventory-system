<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of product_model
 *
 * @author ronversa09
 */
class product_model extends Model{
    //put your code here
    public              $product_id;
    public              $product_name;
    public              $category_name;
    public              $quantity;
    
    private             $itemsPerPage = 20;
    
    
    public function __construct() {
        parent::__construct();
    }
    
    public function filter($search_name, $search_page){
        $query = (mysql_query("SELECT product_id, product_name,  category.category_name, quantity FROM `products` 
                                    inner join category on category.category_id = products.category_id
                                    where product_name like '%$search_name%'
                                    order by product_name
                                    LIMIT " . (($search_page - 1) * $this->itemsPerPage) . ", " . $this->itemsPerPage));
        
        
        $this->product_id         = array();
        $this->product_name         = array();
        $this->category_name        = array();
        $this->quantity             = array();
        while($row = mysql_fetch_array($query)){
            array_push($this->product_id, $row['0']);
            array_push($this->product_name, $row['1']);
            array_push($this->category_name, $row['2']);
            array_push($this->quantity, $row['3']);
        }
    }   
    
    public function getQueryPageSize($search_name){
        $this->query = mysql_query("SELECT product_name,  category.category_name, quantity FROM `products` 
                                    inner join category on category.category_id = products.category_id
                                    where product_name like '%$search_name%'");
        
        return mysql_num_rows($this->query) / $this->itemsPerPage;
    } 
    
    
    
    public function delete($key){
        mysql_query("DELETE FROM `inventory_system`.`products` WHERE `products`.`product_id` = '$key'");
    }
    
    public function edit($key, $newProduct_name, $newCategory_id, $newQuantity){
        mysql_query("UPDATE  `inventory_system`.`products` SET  `product_name` =  '$newProduct_name',
                    `quantity` =  '$newQuantity',
                    `category_id` =  '$newCategory_id' WHERE  `products`.`product_id` = '$key'");
    }
    
    public function insert($newProduct_name, $newCategory_id, $newQuantity){
        mysql_query("INSERT INTO  `inventory_system`.`products` (
                    `product_id` ,
                    `product_name` ,
                    `quantity` ,
                    `category_id`
                    )
                    VALUES (
                    NULL ,  '$newProduct_name',  '$newQuantity',  '$newCategory_id'
                    )");
    }
    
    
    public function getProduct_Info($key){
        $row = mysql_fetch_array(mysql_query("select product_name, category_name, quantity from products
                inner join category on category.category_id = products.category_id 
                where product_id = '$key'"));
           
        $this->product_name = $row['0'];
        $this->category_name = $row['1'];
        $this->quantity = $row['2'];
    }
    
}

?>
