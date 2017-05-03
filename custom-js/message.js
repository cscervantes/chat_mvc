$(function(){
  loadMessages();
  $("#sendBtn").click(function(e){
    e.preventDefault();
    var message = $("#message").val();
    var id = $("#userid").val();
    //alert(id);
    if(message.length != '')
    {
      $.ajax({
        url:'../controller/send.php',
        type:'POST',
        data:{
          'id':id,
          'message':message
        },
        success:function(response){
          console.log(response);
          $(".status").html(response);
          $("#message").val('');
        }
      });
    }
    else{
      alert("Type Something");
    }
  });
  $("#message").keypress(function(e){
    var message = $(this).val();
    var id = $("#userid").val();
    //alert(id);
    if(e.which==13)
    {
      if(message.length != '')
      {
        $.ajax({
          url:'../controller/send.php',
          type:'POST',
          data:{
            'id':id,
            'message':message
          },
          success:function(response){
            console.log(response);
            $(".status").html(response);
            $("#message").val('');
          }
        });
      }
      else{
        alert("Type Something");
      }
    }

  });
});
var timer = setInterval(loadMessages, 1000);
function loadMessages(){
  var id = $("#userid").val();
  $.ajax({
    url:'../controller/message.php',
    type:'GET',
    dataType:'json',
    success:function(response){
      if(response == 'Nothing to Display')
      {
        $(".chat-result").html(response);
      }
      else{
        var cont = "";

        for(var a in response){
          if(response[a].user_id == id)
          {
            cont +="<div class='row' style='background:#677284; border-bottom:1px solid white;'>";
            cont +="<div class='col-md-12'><span>"+response[a].user_name+"</span>";
            cont +="<p style='font-size:10px;'>"+response[a].minute+"</p><p>"+response[a].message+"</p><a class='btn' id='"+response[a].message_id+"'>Delete</a><input type='hidden' id='"+response[a].user_id+"' value='"+response[a].user_id+"'></div>";
            cont +="</div>";
          }
          else{
            cont +="<div class='row' style='background:#7a828e; border-bottom:1px solid white;'>";
            cont +="<div class='col-md-12' style='text-align:right; color:black;'><span>"+response[a].user_name+"</span>";
            cont +="<p style='font-size:10px;'>"+response[a].minute+"</p><p>"+response[a].message+"</p></div>";
            cont +="</div>";
          }

        }
        $(".chat-result").html(cont);
      }

    }
  });
}

$(document).on('click','a.btn', function(){
    //alert($(this).attr('id') + $(this).siblings('input').val());
    var r = confirm('Are you sure you want to delete this message?');
    if(r == true){
      $.ajax({
        url:'../controller/deletemessage.php',
        type:'POST',
        data:{
          'user_id': $(this).siblings('input').val(),
          'message_id': $(this).attr('id')
        },
        success:function(response){
          alert(response);
        }
      });
    }
    else{
      alert('Cancelled!');
    }
});