function requestLogin()
{
  $.ajax({

    type: "POST",
     url: "controllers/login_adm_mode.php",
     data: $('#login-info-form').serialize(),
     success: function(data)
     {
       if(data == 1)
       {
          //PRECISA DO CDN DO SWEETALERT swal( 'Bem-vindo.', 'Aguarde', 'success');

                setTimeout(function(){

                  window.location.href="index.php";

                }, 1500);
       }
     }

     });
}
