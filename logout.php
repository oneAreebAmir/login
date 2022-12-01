<?php
session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['unique_id'])):
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
</head>
<body>
    <?php
        include('php/connection.php');
        session_destroy();
        
        echo '<meta http-equiv="refresh" content="2;url=login.php">';
        echo '<progress max=100><strong>Progress: 60% done.<strong></progress><br>';
        echo '<span>Logging out please wait!...</span>'
    ?>
</body>
</html>