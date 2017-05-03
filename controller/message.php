<?php
include("dbsetting.php");
$sql = mysqli_query($con, "SELECT * FROM messages");
if(mysqli_num_rows($sql)==0){
  echo "Nothing to Display!";
}
else{
  $sql2 = mysqli_query($con, "SELECT b.id as message_id, user_name, user_id, message, b.created_at as minute FROM users a, messages b WHERE a.id = b.user_id ORDER BY(b.id) DESC");
  while($data = mysqli_fetch_array($sql2))
  {
    $json[] = $data;
  }
  echo json_encode($json);
}
mysqli_close($con);
 ?>
