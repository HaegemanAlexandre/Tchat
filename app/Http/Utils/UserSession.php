<?php
namespace App\Http\Utils;

class UserSession
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public static function connect($user, $userId){
        $_SESSION['currentUser'] = [];
        $_SESSION['currentUser']['userLogin'] = $user;
        $_SESSION['currentUser']['userId'] = $userId;
        return true;
    }
    public static function disconnect(){
        unset($_SESSION['currentUser']);
        return true;
        
    }
    public static function isConnected(){
        if(isset($_SESSION['currentUser'])){
            $result = true;
        }else{
            $result = false;
        }
        return $result;
    }
    /*public static function isDisconnected(){
        if(!isset($_SESSION['currentUser'])){
            $result = true;
        }else{
            $result = false;
        }
        return $result;
    }*/
    public static function getUser(){
        if(self::isConnected()){
            $result = $_SESSION['currentUser'];
        }else{
            $result = false;
        }
        return $result;
    }
    public static function getRoleId(){
        
    }
    public static function isAdmin(){
        
    }
}