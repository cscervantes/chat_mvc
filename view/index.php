<?php
session_start();
 ?>

<!DOCTYPE html>
<?php
if(isset($_SESSION["id"]))
{
 ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php $id = $_SESSION["id"]; $name = explode(',',$id); echo ucfirst($name[1]);?></title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <?php
    if(!empty($_SERVER["HTTP_CLIENT_IP"])){
      $IP = $_SERVER["HTTP_CLIENT_IP"];
    }
    else if(!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
    {
      $IP = $_SERVER["HTTP_X_FORWARDED_FOR"];
    }
    else{
      $IP = $_SERVER["REMOTE_ADDR"];
    }
    ?>
    <div class="container">

      <div class="jumbotron text-center">
        <h1><?php echo $IP; ?> Hello, <?php $id = $_SESSION["id"]; $name = explode(',',$id); echo ucfirst($name[1]);?></h1><a href="logout.php" class="badge">Logout</a>
      </div>
    </div>
    <div class="container">
      <div class="col-md-6 chat-body">
        <form class="role">
          <input type="hidden" id="userid" value="<?php $id = $_SESSION["id"]; $name = explode(',',$id); echo $name[0];?>">
          <div class="form-group">
            <label for="message">Message</label>
            <textarea name="message" id="message" rows="10" cols="58" style="resize: none;" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <button id="sendBtn" class="btn btn-success"><i class="glyphicon glyphicon-send"> </i> Send</button>
          </div>
        </form>
      </div>
      <div class="col-md-6 chat-result">
      <label class="status"></label>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../custom-js/message.js"></script>
  </body>
</html>
<?php
}
else{
  header("location: login.php");
}
 ?>
