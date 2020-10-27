<?php

namespace App\Classes;
use PHPMailer;

class Mail
{
    protected $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer;
        $this->setUp();
    }

    public function setUp()
    {

        $this->mail->isSMTP();
        $this->mail->Mailer = "smtp";

        $environment = getenv('APP_ENV');
        if($environment === 'local') {$this->mail->SMTPDebug = 2;}
        $this->mail->SMTPAuth = true; // authentication enabled
        $this->mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for Gmail
        
        
        $this->mail->Host = getenv('SMTP_HOST');
        $this->mail->Port = getenv('SMTP_PORT');
     
        $this->mail->isHTML(true);
        $this->mail->SingleTo = true;

        // auth info
        $this->mail->Username = getenv('EMAIL_USERNAME');
        $this->mail->Password = getenv('EMAIL_PASSWORD');
        
        // sender info
        $this->mail->From=getenv('ADMIN_EMAIL');
        $this->mail->FromName=getenv('Badr Store');

    
    }

    public function send($data)
    {
        $this->mail->addAddress($data['to'], $data['name']);
        $this->mail->Subject = $data['subject'];
        $this->mail->Body = make($data['view'], array('data' => $data['body']));
        return $this->mail->send();        
    }
}