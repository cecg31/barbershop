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
    <title>Business Manager</title>
    <meta charset="utf-8">
    <link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="graphics/styling/sidebar.css?1262">
    <link rel="stylesheet" type="text/css" href="graphics/styling/framework.css?87234">
    <link rel="stylesheet" type="text/css" href="graphics/styling/agenda.css?651">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/sweetalert2/6.6.0/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css">
    <link rel="stylesheet" type="text/css" href="graphics/styling/jquery-clockpicker.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" rel="stylesheet" id="bootstrap-css">
    <!------ Include the above in your HEAD tag ---------->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
    <!--jconfirm cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
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
                <img class="link-url" hashlink="dashboard" style="display:inline-block; width: 40px; border-radius: 25px;  cursor: pointer;" src="graphics/images/logomini.jpg" alt="LOGO">
                <p>Barbearia Amorim - Gestão</p>
            </a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
            <li><a href="#" data-placement="bottom" onclick="click_load('stats')" data-toggle="tooltip" href="#" data-original-title="Stats"><i class="fa fa-bar-chart-o"></i>
                </a>
            </li>
            <li class="dropdown">
                <a href="#" id='user_name_profile' class="dropdown-toggle" data-toggle="dropdown">Perfil<b class="fa fa-angle-down"></b></a>
                <ul class="dropdown-menu">
                    <!--<li><a href="#"><i class="fa fa-fw fa-user"></i> Edit Profile</a></li> -->
                    <!--<li><a href="#"><i class="fa fa-fw fa-cog"></i> Change Password</a></li> -->
                    <li class="divider"></li>
                    <li onclick="logout()"><a href="#"><i class="fa fa-fw fa-power-off"></i>Logout</a></li>
                </ul>
            </li>
        </ul>

        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
               <li>
                   <label data-toggle="collapse" data-target="#submenu-1"> <img class="sidebar-icon" src="graphics/icons/phone-number.png" alt=""> Clientes <i class="fa fa-fw fa-angle-down pull-right"></i></label>
                   <ul id="submenu-1" class="collapse">
                       <li><label class="link-url" hashlink="addclient"><img class="sidebar-li-icon" src="graphics/icons/plus.png" alt=""> Adicionar cliente</label></li>
                       <li><label class="link-url" hashlink="view-client"><img class="sidebar-li-icon" src="graphics/icons/maps-and-flags.png" alt=""> Ver Clientes</label></li>
                   </ul>
               </li>
               <li>
                   <label  data-toggle="collapse" data-target="#submenu-2"> <img class="sidebar-icon" src="graphics/icons/network.png" alt=""> Recursos <i class="fa fa-fw fa-angle-down pull-right"></i></label>
                   <ul id="submenu-2" class="collapse">
                       <li><label class="link-url" hashlink=""><img class="sidebar-li-icon" src="graphics/icons/plus.png" alt=""> Novo Recurso</label></li>
                       <li><label class="link-url" hashlink=""><img class="sidebar-li-icon" src="graphics/icons/worker.png" alt=""> Ver Recursos</label></li>
                   </ul>
               </li>
               <li>
                   <label data-toggle="collapse" data-target="#submenu-3"><img class="sidebar-icon" src="graphics/icons/check.png" alt=""> Marcações <i class="fa fa-fw fa-angle-down pull-right"></i></label>
                   <ul id="submenu-3" class="collapse">
                       <li><label class="link-url" hashlink=""><img class="sidebar-li-icon" src="graphics/icons/wall-calendar.png" alt=""> Nova Marcação</label></li>
                       <li><label class="link-url" hashlink="appointments-table"><img class="sidebar-li-icon" src="graphics/icons/stats-1.png" alt=""> Ver Marcações</label></li>
                   </ul>
               </li>
               <li>
                   <label class="link-url" hashlink="appointments"><img class="sidebar-icon" src="graphics/icons/calendar.png" alt=""> Agenda Semanal</label>
               </li>
               <li>
                   <label class="link-url"><img class="sidebar-icon" src="graphics/icons/settings.png" alt=""> Parâmetros</label>
               </li>
           </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row" id="main" >

                <div class="col-sm-12 col-md-12 well" id="content">

                </div>

            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->



    <script src="js/sidebar.js"></script>
      <script src="scripting/menu.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?sensor=false&key=AIzaSyAg_SrfP-HmwjHgiqLrB6i7ONe6KYmoqgQ"></script>
    <!-- HIGHCHARTS -->

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
    <script src="https://cdn.jsdelivr.net/sweetalert2/6.6.0/sweetalert2.min.js"></script>

</body>

</html>
