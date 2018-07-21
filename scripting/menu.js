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
      $('#content').load('views/add_client.html');
      $('#head-title').html('Registar Cliente');
      $('#main').fadeIn();
      break;

  	  case 'view-clients':
  	  $('#content').load('views/view_clients.html');
      $('#head-title').html('Clientes');
      $('#main').fadeIn();
  	  break;

      case 'addappointment':

      break;

      case 'appointments-table':
      $('#content').load('views/view_appointments.html');
      $('#head-title').html('Marcações');
      $('#main').fadeIn();
      break;

	  case 'appointments':
        $('#content').load('views/agenda.html');
        $('#head-title').html('Agenda Semanal');
        $('#main').fadeIn();
      break;

	  case 'edit-client':
	    $('#content').load('views/edit_client.html');
      $('#head-title').html('Editar Dados');
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
