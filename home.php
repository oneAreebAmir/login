<?php
session_start();

// $redirect_link_case_1 =  base64_encode(hash('sha256',"verification.php".$_SESSION['username']));
$redirect_link_case_1 = "verification.php"; 
// $redirect_link_case_2 =  base64_encode(hash('sha256',"image_profile.php".$_SESSION['username']));
$redirect_link_case_2 = "image_profile.php";

if($_SESSION['redirect_link'] ==  $redirect_link_case_1){
    header('location: verification.php');
}
else if($_SESSION['redirect_link'] ==  $redirect_link_case_2){
    header('location: image_profile.php');
}

if(!isset($_SESSION['username']) && !isset($_SESSION['unique_id']) && !isset($_SESSION['redirect_link'])):
    header('location: login.php');
endif;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/css/style.css">
    <link rel="stylesheet" href="static/css/home.css">
    <title>Login</title>
</head>
<body>
    <header>
        <div>
            <a href="" style="text-decoration: none;color: black;" class="logo">Login</a>            
        </div>

        <div>
            <nav class="navbar">
                <div class="dropdown">
                    <img class="dropbtn" id="profile_img" width="50" height="50" style="margin-top:0.5rem;border-radius: 50%;">
                    <div class="dropdown-content">
                        <a href="settings/">  Setting</a>
                        <a href="logout.php">Logout</a>
                    </div>
                </div>
            </nav> 
        </div>
    </header>

    <main>
        <section>
            
        </section>
    </main>
    <script src="static/js/home.js"></script>
</body>
</html>