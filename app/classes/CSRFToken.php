<?php
namespace App\Classes;


class CSRFToken
{
    /**
     * Generate Token
     * @return bool
     */
    public static function _token()
    {
        // checking if session has a token name or not
        if(!Session::has('token')){
        $randomToken = base64_encode(openssl_random_pseudo_bytes(32));
        Session::add('token', $randomToken);
        }
        return Session::get('token');
    }
        /**
         * Verify CSRFToken
         * @param $requestToken
         * @return bool
         */
    public static function verifyCSRFToken($requestToken)
    {
        if(Session::has('token') && Session::get('token') === $requestToken){
            Session:remove('token');
            return true;
        }
        return false;
    }
}