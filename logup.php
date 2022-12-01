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
        <title>Login</title>
 
        <link rel="stylesheet" href="static/css/logup.css">
        <link rel="stylesheet" href="static/css/style.css">

        <!--Font Awesome CDN Link-->  
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer"/>

    </head>
    <body>
        <main>
            <section id="logup_info">
                <div id="container">
                    <form id="form">
                        <div>
                            <h1>Login</h1>
                        </div> 
                        <div>
                            <div id="error"></div>
                        </div> 
                        <div>
                            <input type="text" id="fname" placeholder="First Name">
                            <input type="text" id="lname" placeholder="Last Name">
                        </div>
                        <div>
                            <input type="email" id="email" placeholder="Email">
                            <input type="text" id="username" placeholder="Username">
                        </div>
                        <div>
                            <div>
                                <span>
                                    <input type="password" id="password" onkeyup="checkPassword(this.value)" placeholder="Password">
                                    <span id="toggleBtn"></span>                              
                                </span>
                                <span>
                                    <input type="password" id="c_password" placeholder="Password">
                                    <span id="c_toggleBtn"></span>
                                </span>
                            </div>
                            <div>
                                <div class="validation">
                                    <ul>
                                        <li id="uppercase">At least one uppercase character</li>
                                        <li id="lowercase">At least one lowercase character</li>
                                        <li id="number">At least one number</li>
                                        <li id="character">At least one special character</li>
                                        <li id="lenght">At least 8 characters</li>
                                        <li id="whitespace" class="valid">Avoid whitespace</li>
                                    </ul>
                                </div>  
                            </div>
                        </div>
                        <div>
                            <label for="birthday" min="1-1-1940">Birhtday :</label>
                            <input type="date" id="birthday">
                            <label for="gender">Gender : </label>
                            <select id="gender">
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>
                        <div>
                            <input type="submit" id="submit" name="submit">
                        </div>
                        <div>
                            <a href="login.php">Already Have Account!</a>
                        </div>
                    </form>
                </div>
            </section>
        </main>
        <script src="static/js/logup.js" defer></script>
    </body>
</html>
