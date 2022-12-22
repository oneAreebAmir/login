<!--  Author : Areeb Amir
 Created on : 23/12/2022
 https://www.github.com/oneAreebAmir
 Important ==> In this whole folders and files is not complete. Need to add more features and ideas. -->

<?php
session_start();
if(isset($_SESSION['username']) && isset($_SESSION['unique_id'])):
    header('location: home.php');
endif;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="static/css/style.css">
        <link rel="stylesheet" href="static/css/login.css">
        <title>Login</title>

        <!--Font Awesome CDN Link-->  
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer"/>

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
                            <input type="email"id="email" placeholder="Email or Username" autocomplete="off">
                        </div>
                        <div>
                            <span>
                                <input type="password" id="password" placeholder="Password">
                                <span id="toggleBtn"></span>                               
                            </span>
                        </div>
                        <div>
                            <a class="forget_pwd" id="forget_pwd" href="/recovery/">Forget Password?</a>
                        </div>
                        <div>
                            <input type="submit" value="Submit" id="submit">
                        </div>
                        <div>
                            <a href="logup.php">Create New Account!</a>
                        </div>
                    </form>
                </div>
            </section>
        </main>
        <script src="static/js/login.js" defer></script>
    </body>
</html>
