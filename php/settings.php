<?php
include("../php/connection.php");

session_start();

$username = $_SESSION['username'];
$unique_id = $_SESSION['unique_id'];

if(isset($_SESSION['username']) && isset($_SESSION['unique_id'])){    

    $username_query = "SELECT * FROM users WHERE username = '{$username}'  LIMIT 1";
    $result_username_query = mysqli_query($conn, $username_query);

    if(mysqli_num_rows($result_username_query) > 0){
        global $data;
        $data = array();
        while($row = mysqli_fetch_assoc($result_username_query)){
            $data[] = $row;
        }
    }
    echo json_encode($data);
}

?>