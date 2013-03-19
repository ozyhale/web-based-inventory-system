<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of category_model
 *
 * @author ronversa09
 */
class category_model extends Model{
    public              $category_id;
    public              $category_name;
    
    private             $itemsPerPage = 20;

    public function __construct() {
        parent::__construct();
    }
    
    public function filter($search_name, $search_page){
        $query = (mysql_query("SELECT category_id, category_name FROM `category` 
                                    where category_name like '%$search_name%'
                                    order by category_name
                                    LIMIT " . (($search_page - 1) * $this->itemsPerPage) . ", " . $this->itemsPerPage));
        
        $this->category_id         = array();
        $this->category_name       = array();
        while($row = mysql_fetch_array($query)){
            array_push($this->category_id, $row['0']);
            array_push($this->category_name, $row['1']);
        }
    }   
    
    public function getQueryPageSize($search_name){
        $query = mysql_query("SELECT category_id, category_name FROM `category` 
                                    where category_name like '%$search_name%'");
        
        return mysql_num_rows($query) / $this->itemsPerPage;
    } 
    
    public function delete($key){
        mysql_query("DELETE FROM `inventory_system`.`category` WHERE `category`.`category_id` = '$key'");
    }
    
    public function edit($key, $newCategory_name){
        mysql_query("UPDATE  `inventory_system`.`category` SET  `category_name` =  '$newCategory_name' WHERE  `category`.`category_id` = '$key'");
    }
    
    public function insert($newCategory_name){
        mysql_query("INSERT INTO  `inventory_system`.`category` (
                    `category_id` ,
                    `category_name`
                    )
                    VALUES (
                    NULL ,  '$newCategory_name'
                    )");   
    }
    
    public function getCategory_Info($key){
        $row = mysql_fetch_array(mysql_query("select category_id, category_name from category
                where category_id = '$key'"));
           
        $this->category_id = $row['0'];
        $this->category_name = $row['1'];
    }
    
    public function getCategory(){
        $query = mysql_query("SELECT category_id, category_name FROM `category` order by category_name");
        
        $this->category_id         = array();
        $this->category_name       = array();
        while($row = mysql_fetch_array($query)){
            array_push($this->category_id, $row['0']);
            array_push($this->category_name, $row['1']);
        }
    }
    
}

?>
