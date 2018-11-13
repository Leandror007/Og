<?php include "../corpo/corpo.php"; ?>

<?php

    include "../db_connect.php";
  
   
    $con =  mysql_connect($servername, $username, $password) or die($erro[0]);
    mysql_select_db($dbname, $con) or die($erro[1]);
    //$sQuery ="SELECT * from  tbog where  id = ". $_GET["id"];
    $sQuery ="SELECT * FROM tbog WHERE _status LIKE 'Fechado' ORDER BY id DESC LIMIT 30";

    $oUsers = mysql_query($sQuery,$con) or die(mysql_error());
    $oU = mysql_query($sQuery,$con) or die(mysql_error());

    $reg = mysql_fetch_array($oUsers);
    mysql_data_seek($oUsers, '0'); //corrigi o valor do while para iniciar em 0
    $totalRows_Rs = mysql_num_rows($oUsers);

    $reg1 = mysql_fetch_array($oU);
    mysql_data_seek($oU, '0'); //corrigi o valor do while para iniciar em 0

   // $msg = $_REQUEST["msg"];
    mysql_set_charset('utf8');

    

?>

<script>
  function gerarScript(id){       
    window.open('script.php?id='+id, 'Pagina', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=50, LEFT=170, WIDTH=480, HEIGHT=380')+id;
  }

</script>

          <!-- =============================================== -->

          <!-- Content Wrapper. Contains page content -->
          <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
             
            </section>

     <?php


$result1 = 0;
$result2 = 0;
$result3 = 0;
$result4 = 0;

  while ($oRow1 = mysql_fetch_array($oU)) {


       $dataFuturo = $oRow1['dtfechamento'].' '.$oRow1['hrfechamento'];
       $dataAtual  = $oRow1['dtacionamento'].' '.$oRow1['hracionamento'];
       $date_time  = new DateTime($dataAtual);
       $diff       = $date_time->diff( new DateTime($dataFuturo));


     


        $dataA2 = date('d/m/Y H:i:s', strtotime("+2 hour",strtotime($dataAtual)));
        $dataA4 = date('d/m/Y H:i:s', strtotime("+4 hour",strtotime($dataAtual)));
        $dataA6 = date('d/m/Y H:i:s', strtotime("+6 hour",strtotime($dataAtual)));
        $dataAf = date('d/m/Y H:i:s', strtotime($dataFuturo));
        $dataAa = date('d/m/Y H:i:s', strtotime($dataAtual));


if($dataAf <= $dataA2){
   
    $result1++;   

}
else if($dataAf <= $dataA4){
   
    $result2++;    

}
else if($dataAf <= $dataA6){
   
    $result3++;    

}
else {
   
    $result4++;    
    
}
       
 

}

?>       

            <!-- ========================================================================================================== -->
            <!-- Main content -->

	  <section class="content">


          <!-- =========================================================== -->

          <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box bg-aqua">
                <span class="info-box-icon"><i class="fa f fa-ticket"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">0 a 2 Horas</span>
                  <span class="info-box-number"><?php echo $result1;  ?></span>
                  
                  <span class="progress-description">
                    Resolvido 0 a 2 horas
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box bg-green">
                <span class="info-box-icon"><i class="fa  fa-ticket"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">2 a 4 Horas</span>
                  <span class="info-box-number"><?php echo $result2;  ?></span>
                  <span class="progress-description">
                    Resolvido 2 a 4 horas
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box bg-yellow">
                <span class="info-box-icon"><i class="fa fa-ticket"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">4 a 6</span>
                  <span class="info-box-number"><?php echo $result3;  ?></span>               
                  <span class="progress-description">
                    Resolvido 4 a 6 horas
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box bg-red">
                <span class="info-box-icon"><i class="fa fa-ticket"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">+ 6</span>
                  <span class="info-box-number"><?php echo $result4;  ?></span>                 
                  <span class="progress-description">
                    Resolvido + 6 horas
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

          <!-- =========================================================== -->






 <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Tabela de Prazo - Ultimos 30 registros</h3>
                  <div class="box-tools">
                    <div class="input-group" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                        <th># </th>
                        <th><center>Regional </center></th>
                        <th><center>OG </center></th>
                        <th><center>Data abertura </center></th>
                        <th><center>Dora abertura </center></th>
                        <th><center>Data fechamento </center></th>
                        <th><center>Hora fechamento </center></th>
                        <th><center>Tempo </center></th>
                        <th>Resolvido entre </center></th>
                    </tr>

<?php


$result1 = 0;
$result2 = 0;
$result3 = 0;
$result4 = 0;

  while ($oRow = mysql_fetch_array($oUsers)) {
      echo '<tr>';

        echo '<td> <center>'. $oRow['id'] . '</center></td>';
        echo '<td> <center>'. $oRow['regional'] . '</center></td>';
        echo '<td> <center>'. $oRow['og'] . '</center></td>';
        echo '<td> <center>'. $oRow['dtacionamento'] . '</center></td>';
        echo '<td> <center>'. $oRow['hracionamento'] . '</center></td>';
        echo '<td> <center>'. $oRow['dtfechamento'] . '</center></td>';
        echo '<td> <center>'. $oRow['hrfechamento'] . '</center></td>';


       $dataFuturo = $oRow['dtfechamento'].' '.$oRow['hrfechamento'];
       $dataAtual  = $oRow['dtacionamento'].' '.$oRow['hracionamento'];
       $date_time  = new DateTime($dataAtual);
       $diff       = $date_time->diff( new DateTime($dataFuturo));


       echo '<td> <center>'. $diff->format('%d dia(s), %H hora(s), %i minuto(s) e %s segundo(s)'). '</center></td>';


        $dataA2 = date('d/m/Y H:i:s', strtotime("+2 hour",strtotime($dataAtual)));
        $dataA4 = date('d/m/Y H:i:s', strtotime("+4 hour",strtotime($dataAtual)));
        $dataA6 = date('d/m/Y H:i:s', strtotime("+6 hour",strtotime($dataAtual)));
        $dataAf = date('d/m/Y H:i:s', strtotime($dataFuturo));
        $dataAa = date('d/m/Y H:i:s', strtotime($dataAtual));


if($dataAf <= $dataA2){
    echo '<td><span class="btn btn-block btn-primary btn-sm"> 0 e 2 horas </span></td>'; 
    $result1++;   

}
else if($dataAf <= $dataA4){
    echo '<td><span class="btn btn-block btn-success btn-sm"> 2 e 4 horas </span></td>';
    $result2++;    

}
else if($dataAf <= $dataA6){
    echo '<td><span class="btn btn-block btn-warning btn-sm"> 4 e 6 horas </span></td>';
    $result3++;    

}
else {
    echo '<td><span class="btn btn-block btn-danger btn-sm">+ 6 horas </span></td>';
    $result4++;    
    
}
       
 echo '</tr>';

}

?>


                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
          </div>
        </section><!-- /.content -->






  </div><!-- /.content-wrapper -->

          <footer class="main-footer">
            <div class="pull-right hidden-xs">
              <b>Version</b> 2.3.0
            </div>
            
          </footer>

          <!-- Control Sidebar -->
          <aside class="control-sidebar control-sidebar-dark">
            <!-- Create the tabs -->
            <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
              <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>

              <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
              <!-- Home tab content -->
              <div class="tab-pane" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">Recent Activity</h3>
                <ul class="control-sidebar-menu">
                  <li>
                    <a href="javascript::;">
                      <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                      <div class="menu-info">
                        <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                        <p>Will be 23 on April 24th</p>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="javascript::;">
                      <i class="menu-icon fa fa-user bg-yellow"></i>
                      <div class="menu-info">
                        <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
                        <p>New phone +1(800)555-1234</p>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="javascript::;">
                      <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
                      <div class="menu-info">
                        <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
                        <p>nora@example.com</p>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="javascript::;">
                      <i class="menu-icon fa fa-file-code-o bg-green"></i>
                      <div class="menu-info">
                        <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
                        <p>Execution time 5 seconds</p>
                      </div>
                    </a>
                  </li>
                </ul><!-- /.control-sidebar-menu -->

                <h3 class="control-sidebar-heading">Tasks Progress</h3>
                <ul class="control-sidebar-menu">
                  <li>
                    <a href="javascript::;">
                      <h4 class="control-sidebar-subheading">
                        Custom Template Design
                        <span class="label label-danger pull-right">70%</span>
                      </h4>
                      <div class="progress progress-xxs">
                        <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="javascript::;">
                      <h4 class="control-sidebar-subheading">
                        Update Resume
                        <span class="label label-success pull-right">95%</span>
                      </h4>
                      <div class="progress progress-xxs">
                        <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="javascript::;">
                      <h4 class="control-sidebar-subheading">
                        Laravel Integration
                        <span class="label label-warning pull-right">50%</span>
                      </h4>
                      <div class="progress progress-xxs">
                        <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="javascript::;">
                      <h4 class="control-sidebar-subheading">
                        Back End Framework
                        <span class="label label-primary pull-right">68%</span>
                      </h4>
                      <div class="progress progress-xxs">
                        <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                      </div>
                    </a>
                  </li>
                </ul><!-- /.control-sidebar-menu -->

              </div><!-- /.tab-pane -->
              <!-- Stats tab content -->
              <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
              <!-- Settings tab content -->
              <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                  <h3 class="control-sidebar-heading">General Settings</h3>
                  <div class="form-group">
                    <label class="control-sidebar-subheading">
                      Report panel usage
                      <input type="checkbox" class="pull-right" checked>
                    </label>
                    <p>
                      Some information about this general settings option
                    </p>
                  </div><!-- /.form-group -->

                  <div class="form-group">
                    <label class="control-sidebar-subheading">
                      Allow mail redirect
                      <input type="checkbox" class="pull-right" checked>
                    </label>
                    <p>
                      Other sets of options are available
                    </p>
                  </div><!-- /.form-group -->

                  <div class="form-group">
                    <label class="control-sidebar-subheading">
                      Expose author name in posts
                      <input type="checkbox" class="pull-right" checked>
                    </label>
                    <p>
                      Allow the user to show his name in blog posts
                    </p>
                  </div><!-- /.form-group -->

                  <h3 class="control-sidebar-heading">Chat Settings</h3>

                  <div class="form-group">
                    <label class="control-sidebar-subheading">
                      Show me as online
                      <input type="checkbox" class="pull-right" checked>
                    </label>
                  </div><!-- /.form-group -->

                  <div class="form-group">
                    <label class="control-sidebar-subheading">
                      Turn off notifications
                      <input type="checkbox" class="pull-right">
                    </label>
                  </div><!-- /.form-group -->

                  <div class="form-group">
                    <label class="control-sidebar-subheading">
                      Delete chat history
                      <a href="javascript::;" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                    </label>
                  </div><!-- /.form-group -->
                </form>
              </div><!-- /.tab-pane -->
            </div>
          </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
      immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->



  <!-- jquery plugin -->
  <script type="text/javascript" src="assests/jquery/jquery.min.js"></script>
  <!-- bootstrap js -->
  

  <!-- include custom index.js -->
  <script type="text/javascript" src="custom/js/index.js?<?php echo time(); ?>"></script>



    <!-- jQuery 2.1.4 -->
    <script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>

    <!-- SweetAlert -->
    <script src="../../plugins/sweetalert/sweetalert.min.js"></script>
    <!-- Bootstrap-notify -->
    <script src="../../plugins/bootstrap-notify/bootstrap-notify.min.js"></script>
    <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script src="../../plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
    <script src="customer.js?<?php echo time(); ?>"></script>

  </body>
  </html>
