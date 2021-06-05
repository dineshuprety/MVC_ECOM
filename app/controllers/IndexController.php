<?php

namespace App\Controllers;
use App\Classes\Mail;

class IndexController extends BaseController
{
    public function show()
    {
        echo "Inside Homepage from controller class<br>";
        //creating object to call MAil class
        $mail = new Mail();
        $datas = [
            'to' => 'dineshuprety500@gmail.com',
            'subject' => 'welcome to 40plus Template',
            'view' => 'Welcome',
            'name' => 'Dinesh Uprety',
            'body' => 'Testing email template',
            'username' => 'Dinesh Uprety'
        ];
        if($mail->send($data)){
            echo "Email sent successfully";
        }else{
            echo "Email sending failed";
        }
    }
}