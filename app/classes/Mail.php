<?php 
namespace App\Classes;
use PHPMailer\PHPMailer\PHPMailer;

class Mail
{
    protected $mail;

    public function __construct()
    {
        //Instantiation 
        $this->mail = new PHPMailer;
        $this->setUP();
    }

    public function setUp()
    {
        //Server settings
        $this->mail->isSMTP();
        $this->mail->Mailer = 'smtp';
        $this->mail->SMTPAuth = true;
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;;
        
        $this->mail->Host = getenv('SMTP_HOST');
        $this->mail->Port = getenv('SMTP_PORT');
        
        //enable all PHPMailer SMTPdebuging
        $environment = getenv('APP_ENV');
        if($environment === 'local'){$this->mail->SMTPDebug = '';}
        
        //auth info
        $this->mail->Username = getenv('EMAIL_USERNAME');
        $this->mail->Password = getenv('EMAIL_PASSWORD');
        
        $this->mail->isHTML(true);
        
        
        //sender info
        $this->mail->From = getenv('ADMIN_EMAIL');
        $this->mail->FromName = getenv('APP_NAME');
    }

    public function send($data)
    {
        
        $this->mail->addAddress($data['to'], $data['name']);
        $this->mail->Subject = $data['subject'];
        $this->mail->Body = make($data['view'], array('data' => $data['body']));
        return $this->mail->send();
    }
   
}