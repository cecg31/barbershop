function requestLogin()
{
  $.ajax({

    type: "POST",
     url: "controllers/login_Perform.php",
     data: $('#login-info-form').serialize(),
     success: function(data)
     {

       if(data == 'verificado')
       {
            swal( 'Bem-vindo.', 'Aguarde', 'success');

                setTimeout(function(){

                  window.location.href="main.php#view=dashboard";

                }, 1500);
       }
  	   else
       {
         swal( 'Ups!', 'Verifique os seus dados.', 'warning');

             setTimeout(function(){

               window.location.href="main.php#view=dashboard";

             }, 1500);
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
