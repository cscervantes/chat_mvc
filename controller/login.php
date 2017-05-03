<?php
session_start();
include("dbsetting.php");

if(isset($_POST['username']) && isset($_POST['password']))
{
$username = $_POST['username'];
$password = $_POST['password'];
$sql = mysqli_query($con,"SELECT * FROM users WHERE user_name='$username' AND user_password='$password'");
if(mysqli_num_rows($sql)==1){
  $result = mysqli_fetch_array($sql);
  $id = $result["id"];
  $name = $result["user_name"];
  $_SESSION["id"] = $id.",".$name;;
  echo "Login Success!";
}
else{
  echo "Invalid Credentials";
}
}
mysqli_close($con);
?>
