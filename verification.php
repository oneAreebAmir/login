<?php
session_start();

// $redirect_link_case_1 =  base64_encode(hash('sha256',"home.php".$_SESSION['username']));
// $redirect_link_case_2 =  base64_encode(hash('sha256',"verification.php".$_SESSION['username']));
$redirect_link_case_1 = "home.php";
$redirect_link_case_2 = "verification.php";
if($_SESSION['redirect_link'] == $redirect_link_case_1){
    header('location: home.php');
}
else if($_SESSION['redirect_link'] != $redirect_link_case_2){
    header('location: image_profile.php');
}

if(!isset($_SESSION['email']) && !isset($_SESSION['unique_id']) && !isset($_SESSION['redirect_link'])):
    header('location: login.php');
endif;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="static/css/style.css">
    <link rel="stylesheet" href="static/css/verification.css">
</head>
<body>
    <main>
        <section>
            <div id="container">
                <form method="post" id="form">
                    <div>
                        <h1>Login</h1>
                    </div>
                    <div>
                        <div id="error"></div>
                    </div>
                    <div>
                        <h2>Enter the verification code sent to your account.</h2>
                    </div>
                    <div>
                        <span>
                            <input type="text" id="verification_code" placeholder="Verification Code">
                            <span id="toggleBtn"></span>                               
                        </span>
                    </div>
                    <div>
                        <input type="submit" value="Submit" id="submit">
                    </div>
                </form>
            </div>
        </section>
    </main>
    <script src="static/js/verification.js"></script>
</body>
</html>