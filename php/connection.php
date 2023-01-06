<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "login_data";
$conn = mysqli_connect($host,$user,$pass,$db);

if(!$conn){
  die('Somethings Happening Wrong!');
}
?>
