function requestLogin()
{
  $.ajax({

    type: "POST",
     url: "controllers/login_adm_mode.php",
     data: $('#login-info-form').serialize(),
     success: function(data)
     {

       if(data == 'verificado')
       {
            swal( 'Bem-vindo.', 'Aguarde', 'success');

                setTimeout(function(){

                  window.location.href="main.php";

                }, 1500);
       }
  	   else
       {
  		   alert(data); //limpar campos depois do alert
  	   }

     }

     });
}

$( document ).ready(function() {

  $("#username").keypress(function(e) {
    if(e.which == 13)
    {
      $('#userpassword').focus();
    }
});

$("#userpassword").keypress(function(e) {
  if(e.which == 13)
  {
      $('#loginbutton').click();
  }
});

});
