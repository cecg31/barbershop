

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>PCO Login</title>
	<!-- CDN -->
  <link rel="stylesheet" href="dists/bootstrap.min.css" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="dists/bootstrap.min.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jQuery library -->
    <link href="https://fonts.googleapis.com/css?family=Merienda" rel="stylesheet">

    <!-- Latest compiled JavaScript -->

  <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.4/highcharts.js"></script>   -->
    <link rel="stylesheet" type="text/css" href="graphics/styling/dashboard.css">
    <script src="board.js"></script>

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
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="">
                <img src="graphics/images/barberpole.gif" alt="LOGO">
                <p style="color:white;">Barbearia Amorim</p>
            </a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
            <li><a href="#" data-placement="bottom" data-toggle="tooltip" href="#" data-original-title="Stats"><i class="fa fa-bar-chart-o"></i>
                </a>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Administrador <b class="fa fa-angle-down"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="fa fa-fw fa-user"></i> Edit Profile</a></li>
                    <li><a href="#"><i class="fa fa-fw fa-cog"></i> Change Password</a></li>
                    <li class="divider"></li>
                    <li><a href="#"><i class="fa fa-fw fa-power-off"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">



                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-1"><i class="fa fa-fw fa-file-text-o"></i> Clientes<i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-1" class="collapse">
                        <li><a href="#avaliacoes.html" class="links"><i class="fa fa-angle-double-right"></i> Novo Cliente</a></li>
                        <li><a href="#avaliacoes.html" class="links"><i class="fa fa-angle-double-right"></i> Ver Clientes</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-2"><i class="fa fa-fw fa-file-text-o"></i> Salão<i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-2" class="collapse">
                        <li><a href="#avaliacoes.html" class="links"><i class="fa fa-angle-double-right"></i> Novo Barbeiro</a></li>
                        <li><a href="#avaliacoes.html" class="links"><i class="fa fa-angle-double-right"></i> Ver Barbeiros</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-3"><i class="fa fa-fw fa-file-text-o"></i> Marcações<i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-3" class="collapse">
                        <li><a href="#avaliacoes.html" class="links"><i class="fa fa-angle-double-right"></i> Nova Marcação</a></li>
                        <li><a href="#avaliacoes.html" class="links"><i class="fa fa-angle-double-right"></i> Ver Marcações</a></li>
                        <li><a href="#avaliacoes.html" class="links"><i class="fa fa-angle-double-right"></i> Encontrar Vaga</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#equipas.html" class="links"><i class="fa fa-fw fa fa-question-circle"></i> Agenda Semanal</a>
                </li>

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row" id="main" >
                <div class="col-sm-11 col-md-11 well" id="content">
                    <h1>Bem-vindo Carlos Gonçalves </h1>


                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div><!-- /#wrapper -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-fw fa fa-file-text-o"></i> Nova Avaliação Coletiva</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

                    <form>

                      <div class="form-group">

                        <input type="email" id="aval_nome" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nome da Avaliação">

                     </div>



                   </form>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="button" id="inserir_av" class="btn btn-success">Inserir</button>
            </div>
          </div>
        </div>
      </div>

<script src="https://unpkg.com/sweetalert2@7.0.7/dist/sweetalert2.all.js"></script>

<script>

    $('#inserir_av').on('click', function(){

        $.ajax({
          type: "POST",
          data:{nome_avaliacao: $('#aval_nome').val(), action: "nova_avaliacao"},
          url: "actions/avaliacao_post.php",
          success: function(data)
          {

            switch(data)
            {
                case "error":

                alert("Erro ao inserir os dados!");

                break;

                default:

                swal({

                      type: 'success',
                      title: 'A senha da avaliação é: ' + data,
                      showConfirmButton: false,

                    });

                break;
            }

          }

        });

    });

    $('.links').on('click', function(){

        var $link = $(this).attr('href');

        if($link == "#")
        {

        }
        else
        {
            $link_clean = $link.substring(1, $link.length);

            $('#content').load($link_clean);
        }

    });

</script>

</body>

</html>
