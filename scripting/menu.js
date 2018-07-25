// Verifica a Hash

  function checkLink()
  {

     var urlHash = window.location.hash;
     var url_nonHash = urlHash.replace('#', '');
     var functions = url_nonHash.split('&');
     var toDo = [];

     for (var i = 0; i < functions.length; i++)
     {
         var tempFunction = functions[i];
         var tempArray = tempFunction.split('=');


           if(tempArray.length == 2)
           {
             var tempKey = tempArray[0].replace('=', '');
             var tempValue = tempArray[1];
             toDo[tempKey] = tempValue;

           }

     }
       return toDo;

  }

  $('body').on('click', '.produto-box', function()
  {

    var pid = $(this).attr('prdid');
    getProductHash(pid);


  });

// Hash Change Listener
// PROTOCOLO = view = página pretendida

function changedURL()
{

 var toDo = checkLink();
 $('#main').fadeOut(300, function(){

   switch (toDo['view'])
   {

      case 'dashboard':
      $('#content').load('views/dashboard.html');
      $('#head-title').html('Dashboard');
      $('#main').fadeIn();
      break;

      case 'addclient':
      $('#content').load('views/clients/add_client.html');
      $('#head-title').html('Registar Cliente');
      $('#main').fadeIn();
      break;

  	  case 'view-clients':
  	  $('#content').load('views/clients/view_clients.html');
      $('#head-title').html('Clientes');
      $('#main').fadeIn();
  	  break;

	  case 'edit-client':
	  $('#content').load('views/clients/edit_client.html');
	  $('#head-title').html('Editar Dados');
	  $('#main').fadeIn();
	  break;

	  case 'add_resources':
	  $('#content').load('views/resources/add_resources.html');
	  $('#head-title').html('Adicionar Recursos');
	  $('#main').fadeIn();
	  break;

	  case 'view_resources':
	  $('#content').load('views/resources/view_resources.html');
	  $('#head-title').html('Recursos');
	  $('#main').fadeIn();
	  break;

	  case 'edit_resources':
	  $('#content').load('views/resources/edit_resources.html');
	  $('#head-title').html('Editar Recursos');
	  $('#main').fadeIn();
	  break;

	  case 'add_services':
	  $('#content').load('views/services/add_services.html');
	  $('#head-title').html('Adicionar Serviços');
	  $('#main').fadeIn();
	  break;

	  case 'view_services':
	  $('#content').load('views/services/view_services.html');
	  $('#head-title').html('Serviços');
	  $('#main').fadeIn();
	  break;

	  case 'edit_services':
	  $('#content').load('views/services/edit_services.html');
	  $('#head-title').html('Editar Serviços');
	  $('#main').fadeIn();
	  break;

      case 'add_appointment':
      $('#content').load('views/appointments/add_appointment.html');
      $('#head-title').html('Nova Marcação');
      $('#main').fadeIn();
      break;

      case 'appointments-table':
      $('#content').load('views/appointments/view_appointments.html');
      $('#head-title').html('Marcações');
      $('#main').fadeIn();
      break;

	  case 'appointments':
        $('#content').load('views/agenda.html');
        $('#head-title').html('Agenda Semanal');
        $('#main').fadeIn();
      break;

    case 'logout':
	    $('#content').load('logout.php');
	     window.location.href="index.php";
	  break;

    default:
    $('#content').load('views/dashboard.html');
    window.location.hash = 'view=dashboard';
    $('#main').fadeIn();
    break;

   }


 });


}

window.onhashchange = function()
{
 changedURL();

}

$('.link-url').on('click', function()
{
    var link = $(this).attr('hashlink');
    $('.active-bar').removeClass();
    $(this).addClass('active-bar');
    window.location.hash = 'view=' + link;

});

changedURL();
