<?php 
    require 'vendor/autoload.php';

    class sendEmail{

        public static function sendMail($to,$subject,$content){
            $key = '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';

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