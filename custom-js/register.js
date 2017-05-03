$(function(){
  $("#registerBtn").click(function(e){
    e.preventDefault();
    //alert($("#username").val());
    var name = $("#username").val();
    var pass = $("#password").val();
    $.ajax({
      url:'../controller/register.php',
      type:'POST',
      data:{
        'username':name,
        'password':pass
      },
      success:function(response){
        console.log(response);
        $("p#msg-show").html(response);
        setTimeout(function(){window.location.href='login.php'},1000);
      }
    });

  });
});
