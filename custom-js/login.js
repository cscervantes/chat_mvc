$(function(){
  $("#btnsubmit").click(function(e){
    e.preventDefault();
    // alert($("#username").val());
    var name = $("#username").val();
    var pass = $("#password").val();
    $.ajax({
      url:'../controller/login.php',
      type:'POST',
      data:{
        'username':name,
        'password':pass
      },
      success:function(response){
        console.log(response);
        $("p#msg").html(response);
        setTimeout(function(){window.location.href='index.php'},1000);
      }
    });

  });
});
