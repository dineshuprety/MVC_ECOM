<?php

namespace App\Classes;

Class Role{

public static function middleWare($role){
 $message ='';
 
 switch($role){
 
    case 'admin':
        $message = "You are not Autthorized to view admin Pannel";
        break;
    case 'user':
        $message = "You are not Autthorized to view this Page. Login First";
        break;
       
    case 'Wholesaler':
        $message = "You are not Autthorized to view this page";
        break;
 }
 if(isAuthenticated()){
     if(user()->role != $role){
        Session::add('error',$message);
        return false;
     }
 }
 else{
    Session::add('error',$message);
    return false;
 }

return true;
}


}
