<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User_Model
 *
 * @author IC
 */
class User_Model extends Model{
    public              $username;
    public              $fisrtname;
    public              $lastname;
    public              $middle_initial;
    
    
    public function __construct() {
        parent::__construct();
    }
    
    public function isUser_Exist($user, $pass){
        $row = mysql_fetch_array(mysql_query("select count(*) as Count from users where username = '$user' and password = '$pass'"));

        return $row['Count'] > 0 ? true : false;
    }
    
    public function getUserInfo($user){
        $row = mysql_fetch_array(mysql_query("select firstname, lastname, middle_initial from users where username = '$user'"));
        
        
        $this->fisrtname = $row['0'];
        $this->lastname = $row['1'];
        $this->middle_initial = $row['2'];
        
    }
    //put your code here
}

?>
