 <?php
include("connection.php");

session_start();

$username = $_SESSION['username'];
$unique_id = $_SESSION['unique_id'];

$data  = stripslashes(file_get_contents("php://input"));
$php_data = json_decode($data, true);

$non_escape_verification_code = $php_data['verification_code'];

$verification_code = mysqli_real_escape_string($conn, $non_escape_verification_code);

$verification_code_value = "";

// $redirect_link = base64_encode(hash('sha256',"image_profile.php".$_SESSION['username']));
$redirect_link = "image_profile.php";

function destroy_verification(){
    session_destroy();
    echo("RTLIDTISO");
}

if(isset($_SESSION['username']) && isset($_SESSION['unique_id'])){
    if(!empty($verification_code)){
        $username_query = "SELECT * FROM users WHERE username = '{$username}' AND unique_id = '{$unique_id}' LIMIT 1";
        $result_username_query = mysqli_query($conn, $username_query);
        if((mysqli_num_rows($result_username_query) > 0)){
            $row = mysqli_fetch_assoc($result_username_query);
            if($row['redirect_link'] == "verification.php"){
                if($row['verification_code'] == $verification_code){
                    $change_redirect_link_value_to_default_query = "UPDATE users SET redirect_link='{$redirect_link}', verification_code='{$verification_code_value}' WHERE unique_id = '{$unique_id}'"; 
                    $change_redirect_link_value_to_default_query_result = mysqli_query($conn, $change_redirect_link_value_to_default_query);
                    if($change_redirect_link_value_to_default_query_result){
                        $_SESSION['redirect_link'] = $redirect_link;
                        echo('success');
                    }else{
                        destroy_verification();
                    }
                }
                else{
                    echo("Invalid Verification Code");
                }   
            }else{
                destroy_verification();
            }
        }else{
            destroy_verification();
        }
    }else{
        echo("Fill all Fields");
    }
}else{
    destroy_verification();
}
?>