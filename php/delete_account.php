<?php
include("connection.php");

session_start();

$username = $_SESSION['username'];
$unique_id = $_SESSION['unique_id'];

function destroy_deleting_account(){
    session_destroy();
    echo("RTLIDTISO");
}

if(isset($_SESSION['username']) && isset($_SESSION['unique_id'])){
    $delete_account_query = "DELETE FROM users WHERE unique_id = '{$unique_id}'";
    $delete_account_result = mysqli_query($conn, $delete_account_query);

    if($delete_account_result){
        session_destroy();
        echo('success');
    }
    else{
        destroy_deleting_account();
    }
}else{
    destroy_deleting_account();
}
mysqli_close($conn);
?>