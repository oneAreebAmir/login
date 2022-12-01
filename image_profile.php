<?php
session_start();
$redirect_link =  base64_encode(hash('sha256',"home.php".$_SESSION['username']));
// $redirect_link = "home.php";

if($_SESSION['redirect_link'] == $redirect_link){
    header('location: home.php');
}

if($_SESSION['redirect_link'] == "verification.php"){
    header(('location: verification.php'));
}

if(!isset($_SESSION['username']) && !isset($_SESSION['unique_id'])){
    header('location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/css/style.css">
    <link rel="stylesheet" href="static/css/image_profile.css">
    <title>Login</title>
</head>
<body>
    <main>
        <section id="container">
            <form id="image_form">
                <div>
                    <h1>Login</h1>
                </div>
                <div>
                    <div id="image_error"></div>
                </div>
                <div id="imgBox">
                    <input type="file" id="imgfile" name="upload_file" onchange="loadFile(event)">
                    <label for="imgfile"><img src="resource/upload.png" width="180px" height="180px" class="upload" id="upload_file"></label>
                </div>
                <div>
                    <input type="submit" id="submit" value="Submit"></input>
                </div>
            </form>
        </section>
    </main>
    <script src="static/js/image_profile.js"></script>
</body>
</html>