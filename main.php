<?php

@session_start();
if(!isset($_SESSION['USERNAME']))
{
    echo '<script>window.location.href="index.php"</script>';
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Gestor de Salão</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- FAVICON -->
    <link rel="shortcut icon" href="graphics/images/favicon.ico" type="image/x-icon" />
     <!-- CSS LIBRARIES -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="dists/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/sweetalert2/6.6.0/sweetalert2.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" type="text/css" href="dists/jquery-clockpicker.min.css">
    <link rel="stylesheet" href="dists/jquery-clockpicker.css">
	   <!-- CSS NATIVE -->
    <link rel="stylesheet" type="text/css" href="graphics/styling/sidebar.css?1262">
    <link rel="stylesheet" type="text/css" href="graphics/styling/framework.css?87234">
    <link rel="stylesheet" type="text/css" href="graphics/styling/agenda.css?651">
    <!-- FONTS -->
    <link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
    <!-- JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

</head>
<body>

<div id="throbber" style="display:none; min-height:120px;"></div>
<div id="noty-holder"></div>
<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Navegação</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" >
                <img class="link-url" hashlink="dashboard" style="display:inline-block; width: 40px; border-radius: 25px;  cursor: pointer;" src="graphics/images/devmaicon.png" alt="LOGO">
                <p>DEVMA Soft. - Barbearia Amorim  </p>
            </a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
            <li><a href="#" data-placement="bottom" data-toggle="tooltip" href="#" data-original-title="Stats"><i class="fa fa-bar-chart-o"></i>
                </a>
            </li>
            <li class="dropdown">
                <a href="#" id='user_name_profile' class="dropdown-toggle" data-toggle="dropdown">Opções <b class="fa fa-angle-down"></b></a>
                <ul class="dropdown-menu">
                    <!--<li><a href="#"><i class="fa fa-fw fa-user"></i> Edit Profile</a></li> -->
                    <!--<li><a href="#"><i class="fa fa-fw fa-cog"></i> Change Password</a></li> -->
                    <li class="divider"></li>
                    <li class="link-url dropdown-li" hashlink="logout"><i class="fa fa-fw fa-power-off"></i>Logout</li>
                </ul>
            </li>
        </ul>

        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
               <li>   <!-- CLIENTS -->
                   <label data-toggle="collapse" data-target="#submenu-1"> <img class="sidebar-icon" src="graphics/icons/list.png" alt=""> Clientes <i class="fa fa-fw fa-angle-down pull-right"></i></label>
                   <ul id="submenu-1" class="collapse">
                       <li><label class="link-url" hashlink="addclient"><img class="sidebar-li-icon" src="graphics/icons/add.png" alt=""> Adicionar cliente</label></li>
                       <li><label class="link-url" hashlink="view-clients"><img class="sidebar-li-icon" src="graphics/icons/bullet-list.png" alt=""> Ver Clientes</label></li>
                   </ul>
               </li>
               <li> <!-- RESOURCES -->
                   <label  data-toggle="collapse" data-target="#submenu-2"> <img class="sidebar-icon" src="graphics/icons/customer.png" alt=""> Recursos <i class="fa fa-fw fa-angle-down pull-right"></i></label>
                   <ul id="submenu-2" class="collapse">
                       <li><label class="link-url" hashlink="add_resources"><img class="sidebar-li-icon" src="graphics/icons/add.png" alt=""> Novo Recurso</label></li>
                       <li><label class="link-url" hashlink="view_resources"><img class="sidebar-li-icon" src="graphics/icons/bullet-list.png" alt=""> Ver Recursos</label></li>
                   </ul>
               </li>
               <li> <!-- SERVICES -->
                   <label  data-toggle="collapse" data-target="#submenu-3"> <img class="sidebar-icon" src="graphics/icons/pet.png" alt=""> Serviços <i class="fa fa-fw fa-angle-down pull-right"></i></label>
                   <ul id="submenu-3" class="collapse">
                       <li><label class="link-url" hashlink="add_services"><img class="sidebar-li-icon" src="graphics/icons/add.png" alt=""> Novo Serviço</label></li>
                       <li><label class="link-url" hashlink="view_services"><img class="sidebar-li-icon" src="graphics/icons/bullet-list.png" alt=""> Ver Serviços</label></li>
                   </ul>
               </li>
               <li> <!-- APPOINTMENTS -->
                   <label data-toggle="collapse" data-target="#submenu-4"><img class="sidebar-icon" src="graphics/icons/maps-and-location2.png" alt=""> Marcações <i class="fa fa-fw fa-angle-down pull-right"></i></label>
                   <ul id="submenu-4" class="collapse">
                       <li><label class="link-url" hashlink="add_appointment"><img class="sidebar-li-icon" src="graphics/icons/add.png" alt=""> Nova Marcação</label></li>
                       <li><label class="link-url" hashlink="dashboard"><img class="sidebar-li-icon" src="graphics/icons/time.png" alt=""> Encontrar Vaga</label></li>
                       <li><label class="link-url" hashlink="appointments-table"><img class="sidebar-li-icon" src="graphics/icons/wall-calendar.png" alt=""> Ver Marcações</label></li>
                   </ul>
               </li>
               <li> <!-- CALENDAR WIDGET -->
                   <label class="link-url" hashlink="appointments"><img class="sidebar-icon" src="graphics/icons/calendar.png" alt=""> Agenda Semanal</label>
               </li>
               <!--<li>  PARAMETERS
                   <label class="link-url"><img class="sidebar-icon" src="graphics/icons/wrench.png" alt=""> Parâmetros</label>
               </li> -->
           </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row" id="main" >

                <div class="col-sm-12 col-md-12 well" >
                  <h3 id="head-title">Dashboard</h3><input type="text" id="search" class="form-input" placeholder="Pesquisar">
                  <hr class="title-break">
                  <div class="" id="content">

                  </div>
                </div>

            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->


    <!-- SCRIPTS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="scripting/menu.js"></script>
    <script src="dists/moment.js"></script>
    <script src="dists/jquery-clockpicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.pt.min.js"></script>
    <script src="https://cdn.jsdelivr.net/sweetalert2/6.6.0/sweetalert2.min.js"></script>

</body>

</html>
