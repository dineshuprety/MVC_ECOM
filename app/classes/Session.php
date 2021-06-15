<?php

namespace App\Classes;

class Session
{
     /**
         * @param $name
         * @param $value
         * @return mixed
         * @throws \Exception
         */
   public static function add($name, $value)
   {
       /**
        * Checking the variable empty or nor to create a session 
        */
        if($name != '' && !empty($name) && $value != '' && !empty($value)){
            return $_SESSION[$name] = $value;
        }
        /** throwing error */
        throw new \Exception('Name and Value Requried');
   }
        /**
         * Get the value from Session
         * @param $name
         * @return mixed
         */
    public static function get($name)
    {
        return $_SESSION[$name];
    }

    /**
         * Check is Session Exits
         * @param $name
         * @return bool
         * @throws \Exception
         */
        
    public static function has($name)
    {
        if($name != '' && !empty($name)){
            return (isset($_SESSION[$name])) ? true : false;
        }

        throw new \Exception('name is requried');
    }

    /**
     * remove Session
     * @param $name
     */
    public static function remove($name)
    {
        if(self::has($name)){
            unset($_SESSION[$name]);
        }
    }
}