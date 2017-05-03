<?php
include("dbsetting.php");
if(isset($_POST['message']) && isset($_POST['id']))
{
  $id = $_POST['id'];
  $message = $_POST['message'];
  $sql = mysqli_query($con, "INSERT INTO messages(user_id,message,created_at) VALUES('$id','$message',now())");
  if($sql){
    echo "Successfully Sent!";
  }
  else{
    echo "Sending Failed!";
  }
}
?>
