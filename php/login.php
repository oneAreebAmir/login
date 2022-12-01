<?php
include("connection.php");

session_start();

$data  = stripslashes(file_get_contents("php://input"));
$php_data = json_decode($data, true);

$non_escape_email_or_username = $php_data['email'];
$non_escape_pass = $php_data['password'];

$email_or_username = mysqli_real_escape_string($conn, $non_escape_email_or_username);
$pass = mysqli_real_escape_string($conn, $non_escape_pass);

$hash_pass = hash('sha256', $pass);
$base_pass = base64_encode($hash_pass);

if(!empty($email_or_username) && !empty($pass)){
    $email_query = "SELECT * FROM users WHERE email = '{$email_or_username}'  LIMIT 1";
    $result_email_query = mysqli_query($conn, $email_query);

    $username_query = "SELECT * FROM users WHERE username = '{$email_or_username}'  LIMIT 1";
    $result_username_query = mysqli_query($conn, $username_query);

    if((mysqli_num_rows($result_email_query) > 0) or (mysqli_num_rows($result_username_query) > 0)){
        $username_row = mysqli_fetch_assoc($result_username_query);
        $email_row = mysqli_fetch_assoc($result_email_query);
        global $row;
        if($email_row){
            $row = $email_row;
        }else{
            $row = $username_row;
        }

        if($base_pass === $row['password']){
            $_SESSION["username"] = $row['username'];
            $_SESSION['unique_id'] = $row['unique_id'];
            $_SESSION['redirect_link'] = $row['redirect_link'];
            echo('Successfully Login');
        }
        else{
            echo("Invalid Password");
        }
    }else{
        echo("Invalid Email or Username");
    }
}else{
    echo("Fill all Fields");
}
?>