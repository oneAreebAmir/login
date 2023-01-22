<?php
use PHPMailer\PHPMailer\PHPMailer;

function ConnectMail(){
    require '../PHPMailer/vendor/autoload.php';
    
    $mail = new PHPMailer;
    
    $mail->isSMTP();
    
    $mail->SMTPDebug=0;
    
    $mail->Host = 'smtp-mail.outlook.com';
    
    $mail->Port = 587;
    
    $mail->SMTPAuth = true;
    
    $mail->Username = 'Your-Email';
    
    $mail->Password = 'Your-Password';
    
    $mail->setFrom('Your-Email', 'Login');
    
    $mail->addReplyTo('Your-Replying-Email', 'Login');
}
?>
