<?php

/**
 * Session Class
 *
 * @author Ozy
 */
class Session {
    
    public static function init(){
        session_start();
    }
    
    //mutator

    public static function set_username($username){
        $_SESSION['username'] = $username;
    }
    
    public static function set_password($password){
        $_SESSION['password'] = $password;
    }
    
    public static function set_surname($surname){
        $_SESSION['surname'] = $surname;
    }
    
    public static function set_firstname($firstname){
        $_SESSION['firstname'] = $firstname;
    }
    
    public static function set_middle_initial($middle_initial){
        $_SESSION['middle_initial'] = $middle_initial;
    }
    
    

    //acessor
    
    public static function get_username(){
        return $_SESSION['username'];
    }
    
    
    
    public static function get_surname(){
        return $_SESSION['surname'];
    }
    
    public static function get_firstname(){
        return $_SESSION['firstname'];
    }
    
    public static function get_middle_initial(){
        return $_SESSION['middle_initial'];
    }
    
    
    public static function get_photo(){
        return $_SESSION['photo'];
    }

    public static function user_exist(){
        if(isset($_SESSION['username']) && isset($_SESSION['password'])){
            return true;
        }else{
            return false;
        }
    }
    
    public static function destroy(){
        unset($_SESSION['username']);
        unset($_SESSION['password']);
        session_destroy();
    }
    
    public static function getUserPass(){
        return $_SESSION['password'];
    }
}

?>
