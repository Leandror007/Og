<?php include "../corpo/corpo.php"; ?>


<?php
   

    @$ds_data_in = ($_POST["ds_data_in"]);
    @$ds_data_fim = ($_POST["ds_data_fim"]);

    $_SESSION['ds_data_in'] = $ds_data_in;
    $_SESSION['ds_data_fim'] = $ds_data_fim;

?>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

 <section class="content-header">
      <h1>
        Grafico
        <small>Views</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Gráficos</a></li>
        <li><a href="#">Selecionar Periodo</a></li>
       </ol>
    </section>

     <div class="box box-success">  

<br> <br>

<div class="container">

<body>

<div align="center">
  <center>
  <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="650">
    <tr>
      <td>
      </td>
    </tr>
    <tr>
      <td>&nbsp;
      </td>
    </tr>
    <tr>
      <td><Font face="Arial" size="2"><p align="center"><b> </b></p></font>
      </td>
    </tr>
    <tr>
      <td>&nbsp;
      </td>
    </tr>
    <tr>
      <td>&nbsp;
      </td>
    </tr>

    <tr>
      <td>
      <form method="POST" target="_blank" action="corpo_grafico_busca.php">
    
    <table>
      
      <tr>
        <td class="v1">Data Inicio:</td>
        <td> <input type="date" maxlength="30" name="ds_data_in" id="ds_data_in" size="30"> </td>
          
      </tr>
      <tr>
      <td class="v1">Data Final:</td>
      <td>
       <input type="date" maxlength="30" name="ds_data_fim" id="ds_data_fim" size="30">
      </td>
      </tr>
      


      <tr>
      <td></td>
          <td colspan="2"> <center><input type="submit" value="Exibir" name="B1">
          <input type="reset" value="Limpar" name="B1"></center> </td>
      </tr>
</table>

        
      </form>
      </td>
    </tr>
    <tr>
      <td> </td>
  </table>
  </center>
</div>

</body>

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
  </body>
</html>
</html>
