<?php

namespace App\Controllers;
use App\Classes\Mail;

class IndexController extends BaseController
{
    public function show()
    {
        echo "Inside Homepage from Controller class";
        
        $mail = new Mail();
        $data = [
            'to'        =>  'mz1320021@yahoo.com',
            'subject'   =>  'Welcome to Badr Store',
            'view'      =>  'welcome',
            'name'      =>  'Mohamed Salah',
            'body'      => "Test email template"
        ];
        if($mail->send($data)){
            echo "Email sent successfully";
        }else{
            echo "Email sending failed";
        }
    }
}