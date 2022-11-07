<?php 
    require 'vendor/autoload.php';

    class sendEmail{

        public static function sendMail($to,$subject,$content){
            $key = '';

            $email = new \SendGrid\Mail\Mail();
            $email->setFrom("melissarainford23@gmail.com","Melissa Rainford");
            $email->setSubject($subject);
            $email->addTo($to);
            $email->addContent("text/plain",$content);
            //$email->addContent("text/html",$content);

            $sendgrid = new SendGrid($key);

            try{
                $response = $sendgrid->send($email);
                return $response;
            }catch(Exception $e){
                echo 'Email exception caught :'.$e->getMessage()."\n";
                return false;
            }
        }
    }

?>