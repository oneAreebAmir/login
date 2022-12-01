<?php
include("connection.php");

session_start();

$username = $_SESSION['username'];
$unique_id = $_SESSION['unique_id'];

$redirect_link_value = base64_encode(hash('sha256',"home.php".$_SESSION['username']));

// $redirect_link = base64_encode(hash('sha256',"image_profile.php".$_SESSION['username']));

$redirect_link = 'image_profile.php';

if(isset($_SESSION['username']) && isset($_SESSION['unique_id']) && $_SESSION['redirect_link'] == $redirect_link){
    if($_FILES["imagefile"]["size"] < 100000){
        if(isset($_FILES["imagefile"]["name"])){
            global $conn;
        
            $imageName = $_FILES["imagefile"]["name"];
            $tmpName = $_FILES["imagefile"]["tmp_name"];
        
            $validImageExtension = ['jpg' ,'jpeg', 'png'];
            $imageExtension = explode('.', $imageName);
        
            $name = $imageExtension[0];
            $imageExtension = strtolower(end($imageExtension));
        
            if(in_array($imageExtension, $validImageExtension)){
                $newImageName = $name . "-" .uniqid();
                $newImageName .= '.' . $imageExtension;
        
                move_uploaded_file($tmpName, '../resource/image/' . $newImageName);
                
                $email_query = "SELECT * FROM users WHERE username = '{$username}' AND unique_id = '{$unique_id}' LIMIT 1";
                $result_email_query = mysqli_query($conn, $email_query);
                if(mysqli_num_rows($result_email_query) > 0){
                    $image_insertion_query = "UPDATE users set profile_img = '{$newImageName}', redirect_link = '$redirect_link_value' WHERE unique_id = '{$unique_id}' ";
                    if(mysqli_query($conn, $image_insertion_query)){
                        session_destroy();
                        echo "success";
                    }
                }
                exit();
            }
            else{
                echo 'Only JPG, JPEG & PNG files are allowed.';
            }
        }
    }
    else{
        echo "File should be lesser than 100Kb";
    }
}else{
    echo('RTLIDTISO');
}
?>