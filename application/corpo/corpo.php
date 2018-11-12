<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Sistema de OG </title>
  <link rel="shortcut icon" href="../ico/algartelecom.png">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

    <!-- SweetAlert  style -->
    <link rel="stylesheet" href="../../plugins/sweetalert/sweetalert.css">

    <!-- responsive datatables -->
     <link rel="stylesheet" href="../../plugins/datatables/extensions/Responsive/css/dataTables.responsive.css">

 <?php include '../sessao.php'; ?>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

<?php

if($_SESSION['login'] == ''){

echo '<meta http-equiv="refresh" content="1 ; URL=../../index.php" />';

}else{

?>


      </head>
      <body class="hold-transition skin-blue sidebar-mini">
        <!-- Site wrapper -->
        <div class="wrapper">

          <header class="main-header">
            <!-- Logo -->
            <a href="../../index2.html" class="logo">
              <!-- mini logo for sidebar mini 50x50 pixels -->
              <span class="logo-mini"><b>S</b>OG</span>
              <!-- logo for regular state and mobile devices -->
              <span class="logo-lg"><b>Sistema</b>OG</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
              <!-- Sidebar toggle button-->
              <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </a>
              <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                  <!-- Messages: style can be found in dropdown.less-->

                       <!-- User Account: style can be found in dropdown.less -->
                  <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <img src="../../dist/img/algar.jpg" class="user-image" alt="User Image">
                      <span class="hidden-xs"><?php echo $_SESSION['login'] ?></span>
                    </a>
                    <ul class="dropdown-menu">
                      <!-- User image -->
                      <li class="user-header">
                        <img src="../../dist/img/algar.jpg" class="img-circle" alt="User Image">
                        <p>
                          <?php echo $_SESSION['login'] ?> - Sistema OG
                          <small>Registro</small>
                        </p>
                      </li>
                      <!-- Menu Body -->
                   
                      <!-- Menu Footer-->
                      <li class="user-footer">
                        <div class="pull-left">
                          <a href="#" class="btn btn-default btn-flat">Configuração</a>
                        </div>
                        <div class="pull-right">
                          <a href="../logout.php" class="btn btn-default btn-flat">Sair</a>
                        </div>
                      </li>
                    </ul>
                  </li>
                  <!-- Control Sidebar Toggle Button -->
                  <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                  </li>
                </ul>
              </div>
            </nav>
          </header>

          <!-- =============================================== -->

          <!-- Left side column. contains the sidebar -->
          <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
              <!-- Sidebar user panel -->
              <div class="user-panel">
                <div class="pull-left image">
                  <img src="../../dist/img/algar.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                  <p><?php  echo $_SESSION['login'] ?></p>
                  <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
              </div>
              <!-- search form -->
              <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                  <input type="text" name="q" class="form-control" placeholder="Search...">
                  <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                  </span>
                </div>
              </form>
              <!-- /.search form -->
              <!-- sidebar menu: : style can be found in sidebar.less -->
              <ul class="sidebar-menu">
                <li class="header">NAVEGAÇÃO</li>

<?php  if($_SESSION['nivel'] == 'Sup') { ?>

          <li class="treeview">
              <a href="#">
                <i class="fa fa-bars"></i> <span>Incidentes</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="../og/index.php"><i class="fa fa-circle-o"></i> Abertos</a></li>
                <li><a href="../excluidos/index.php"><i class="fa fa-circle-o"></i> Fechados</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-bar-chart"></i>
                <span>Grafico</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
               <li><a href="../grafico/buscaGrafico.php"><i class="fa fa-circle-o"></i> Grafico OG</a></li>
              </ul>
            </li>

            <li>
              <a href="../rank/relatorio_og.php">
                <i class="fa fa-level-up"></i> <span>Rank Og</span>                
              </a>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-thumbs-o-up"></i> <span>Resoluções</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                 <li><a href="../resolucao/resolvido.php"><i class="fa fa-circle-o"></i> Resolução</a></li>
                <li><a href="../resolucao/buscaregistro.php"><i class="fa fa-circle-o"></i> Busca</a></li>
              </ul>
            </li>
                                           
     
            <li><a href="../maps/map.php" target="_Banck"><i class="fa fa-book"></i> <span>Mapa</span></a></li>


                <li class="treeview">
            <a href="#">
              <i class="fa fa-group"></i> <span>Agentes</span>   <span class="pull-right-container">
                <i class="fa fa-angle"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="../agentes/index.php"><i class="fa fa-circle-o text-green"></i>Usuario</a></li>
            </ul>
          </li>

 <?php  }else{


?>

 <li><a href="../maps/map.php" target="_Banck"><i class="fa fa-book"></i> <span>Mapa</span></a></li>

<?php

  }  ?>
          

          <li class="treeview"><a href="../logout.php"><i class="fa fa-fw fa-sign-in"></i><span>Sair </span></a> 

                <li class="header"></li>
         
              </ul>
            </section>
            <!-- /.sidebar -->
          </aside>

          <!-- =============================================== -->

  <?php

}

?>      

            <!-- ========================================================================================================== -->
            <!-- Main content -->