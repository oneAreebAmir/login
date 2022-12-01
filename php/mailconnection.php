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
    
    $mail->Username = 'oneareebamir@outlook.com';
    
    $mail->Password = 'Areeb105!@';
    
    $mail->setFrom('oneareebamir@outlook.com', 'Areeb Amir');
    
    $mail->addReplyTo('oneareebamir@outlook.com', 'Areeb Amir');
}
?>