<?php
include("dbsetting.php");

if(isset($_POST['message_id']) && isset($_POST['user_id']))
{
$user_id = $_POST['user_id'];
$message_id = $_POST['message_id'];
$delete = mysqli_query($con, "DELETE FROM messages WHERE user_id='$user_id' AND id='$message_id'");
  if($delete){
    echo "Success!";
  }
  else{
    echo "Failed!";
  }
}
mysqli_close($con);
?>