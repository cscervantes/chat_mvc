<?php
include("dbsetting.php");

if(isset($_POST['username']) && isset($_POST['password']))
{
$username = $_POST['username'];
$password = $_POST['password'];
$check = mysqli_query($con, "SELECT * FROM users WHERE user_name='$username' AND user_password='$password'");
$validate = mysqli_num_rows($check);
if($validate >= 1){
  echo "Account already taken!";
}
else{
  $sql = mysqli_query($con, "INSERT INTO users(user_name,user_password,created_at) VALUES('$username','$password',now())");
  if($sql){
    echo "Success!";
  }
  else{
    echo "Failed!";
  }
}
}
mysqli_close($con);
?>
