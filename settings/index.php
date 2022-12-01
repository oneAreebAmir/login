<?php
session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['unique_id'])):
    header('location: ../login.php');
endif;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../static/css/settings.css">
    <link rel="stylesheet" href="../static/css/style.css">
    <title>Login</title>
</head>
<body>
    <div id="error"></div>
    <header>
        <div>
            <a href="" style="text-decoration: none;color: black;" class="logo">Login</a>            
        </div>

        <div>
            <nav class="navbar">
                <div class="dropdown">
                    <img class="dropbtn" id="profile_img" width="50" height="50" style="margin-top:0.5rem;border-radius: 50%;">
                    <div class="dropdown-content">
                        <a href="../">Home</a>
                        <a href="">Setting</a>
                        <a href="../logout.php">Logout</a>
                    </div>
                </div>
            </nav> 
        </div>
    </header>

    <main>
        <section>
            <img id="profile_img_1" width="200" height="200" style="border-radius:50%;">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Birthday</th>
                        <th scope="col">Gender</th>
                    </tr>
                </thead>
                <tbody id="tbody" class="tbody"></tbody>
            </table>
            <br>
            <button type="delete" id="delete_btn_account">Delete Account</button>
        </section>
    </main>
    <script src="../static/js/settings.js"></script>
    <!-- <script src="../static/js/image_profile.js"></script> -->
</body>
</html>