<?php
namespace App\Classes;


class ErrorHandler
{
    public function handleErrors($error_number, $error_message, $error_file, $error_line)
    {
        $error = "[{$error_number}] An error occurred in file
                    {$error_file} on line $error_line: $error_message";

                    $enviroment = getenv('APP_ENV');

                    if($enviroment === 'local'){
                        $whoops = new \Whoops\Run;
                        $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
                        $whoops->register();
                    }else{
                        $data = [
                            'to' => getenv('ADMIN_EMAIL'),
                            'subject' => 'System Error',
                            'view' => 'errors',
                            'name' => 'Admin',
                            'body' => $error,
                        ];
                        //atonce call both function
                        ErrorHandler::emailAdmin($data)->outputFriendlyError();
                    } 
    }
    public function outputFriendlyError()
    {
        ob_end_clean();
        view('errors/generic');

        exit;
    }
    public static function emailAdmin($data)
    {
        $mail = new Mail;
        $mail->send($data);

        return new static;
    }
}