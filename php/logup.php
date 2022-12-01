<?php

use PHPMailer\PHPMailer\PHPMailer;

require '../PHPMailer/vendor/autoload.php';
    
$mail = new PHPMailer;

$mail->isSMTP();

$mail->SMTPDebug=0;

$mail->Host = 'smtp-mail.outlook.com';

$mail->Port = 587;

$mail->SMTPAuth = true;

$mail->Username = 'YOUR-EMAIL';

$mail->Password = 'YOUR-PASSWORD';

$mail->setFrom('YOUR-EMAIL', 'Login LLC');

$mail->addReplyTo('YOUR-REPLYING-EMAIL', 'Login LLC');

session_start();

include_once("connection.php");

$data  = stripslashes(file_get_contents("php://input"));
$php_data = json_decode($data, true);

$non_escape_fname = $php_data['fname'];
$non_escape_lname =  $php_data['lname'];
$non_escape_username =  $php_data['username'];
$non_escape_email = $php_data['email'];
$non_escape_password =  $php_data['password'];
$non_escape_birthday =  $php_data['birthday'];
$non_escape_gender = $php_data['gender'];
$non_escape_date_created =  $php_data['date_created'];

$escape_fname = mysqli_real_escape_string($conn, $non_escape_fname);
$escape_lname = mysqli_real_escape_string($conn, $non_escape_lname);
$escape_username = mysqli_real_escape_string($conn,$non_escape_username);
$escape_email = mysqli_real_escape_string($conn,$non_escape_email);
$escape_password = mysqli_real_escape_string($conn,$non_escape_password);
$escape_birthday = mysqli_real_escape_string($conn,$non_escape_birthday);
$escape_gender = mysqli_real_escape_string($conn, $non_escape_gender);
$escape_date_created = mysqli_real_escape_string($conn,$non_escape_date_created);

$hash_pass = hash('sha256', $escape_password);
$base_pass = base64_encode($hash_pass);

$unique_id = rand(time(), rand(sin(rand(1,100000000)), 1000000000000-cos(90))-100000000000);

$verification_code = $random_hash = substr(md5(uniqid(rand(), true)), 16, 16); 

$verification_start_time =date('Y-m-d h:i:s', strtotime(' + 4 hours'));

// $redirecting_link = base64_encode(hash('sha256',"verification.php".$escape_username));

$redirecting_link = "verification.php";

$user_result = !empty($escape_fname) && !empty($escape_lname) && !empty($escape_username) && !empty($escape_email) && !empty($escape_password) && !empty($escape_birthday) && !empty($escape_date_created);

if($user_result){
    $email_query = "SELECT * FROM users WHERE email='{$escape_email}'";
    $email_query_result = mysqli_query($conn,$email_query);
    if(!(mysqli_num_rows($email_query_result) > 0)){
        $username_query = "SELECT * FROM users WHERE username='{$escape_username}'";
        $username_query_result = mysqli_query($conn, $username_query);
        if(!(mysqli_num_rows($username_query_result) > 0)){
            $insert_query = "INSERT INTO users(unique_id, fname, lname, username, email, password, birthday, gender, date_created, verification_code,verification_time_start, redirect_link) VALUES('{$unique_id}', '{$escape_fname}', '{$escape_lname}', '{$escape_username}','{$escape_email}', '{$base_pass}', '{$escape_birthday}', '{$escape_gender}','{$escape_date_created}', '{$verification_code}', '{$verification_start_time}',  '{$redirecting_link}')";
            $insert_result = mysqli_query($conn, $insert_query);
            if($insert_result){
                $select_query = "SELECT * FROM users WHERE email='{$escape_email}' LIMIT 1";
                $select_query_result = mysqli_query($conn, $select_query);
                if(mysqli_num_rows($select_query_result) > 0){
                    $row = mysqli_fetch_assoc($select_query_result);
                    echo "success";           
                    
                    $mail->addAddress($escape_email, $escape_fname.' '.$escape_lname);
                    $mail->Subject = 'Verification Code to procede Account';
                    $mail->Body = 'Some one has created account on our website. Here is verification code : '.$verification_code;
                    if(!$mail->send()){
                        echo("Something Happen Wrongssss");
                    }
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['unique_id'] = $row['unique_id'];
                    $_SESSION['redirect_link'] = $row['redirect_link'];
                }
            }else{
                echo "Something Happen Wrong";
            }      
        }else{
            echo "This username already exist!";
        }
    }else{
        echo "This email already exist!";
    }
}else{
    echo "Fill All Fields";
} 
mysqli_close($conn);
?>