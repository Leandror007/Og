<?php
include "../db_connect.php";
include "../corpo/corpo.php"; 



mysql_connect($servername, $username, $password);
mysql_select_db($dbname);

@$datainicio = ($_POST["datainicio"]);

@$dataFim = ($_POST["dataFim"]);


$lista = array();
$dens = array();
$cor = array();

$i = 0;

if($datainicio == ''){

$sql = "SELECT regional, COUNT(regional) AS total FROM tbog GROUP BY regional ORDER BY COUNT(regional)";
//$sql = "SELECT * FROM tbl_total";
$resultado = mysql_query($sql);
while($row = mysql_fetch_object($resultado)){
   $regional = $row->regional;
   $total  = $row->total;

   $regionals[$i] = $regional;
   $totais[$i] =  $total;
   $i = $i + 1;
}

}else{

$sql = "SELECT regional, COUNT(regional) AS total FROM tbog WHERE dtacionamento BETWEEN '".$datainicio."' AND '".$dataFim."' GROUP BY regional ORDER BY COUNT(regional)";
//$sql = "SELECT * FROM tbl_total";
$resultado = mysql_query($sql);
while($row = mysql_fetch_object($resultado)){
   $regional = $row->regional;
   $total  = $row->total;

   $regionals[$i] = $regional;
   $totais[$i] =  $total;
   $i = $i + 1;
}

}

?>


<!-- ////////////////////////////////////////////////////////////////////////////////////////  -->

<style type="text/css">
	
	#tela1{ 
		position: relative; 
		top: -350px; 
		left: 15%;					
		height: 540px; 
		width: 70%;
		border: 1px solid white;
	}

	#busca{ 
		width: 50%; 
		margin-left: 20%; 
		margin-top: 30px; 
		float: left;
		border: 1px solid white;
	}

	#resultado{
		width: 50%; 
		margin-left: 20%; 
		margin-top: 30px; 
		float: left;
		border: 1px solid white;
	}	

	table[name=tabela01]{
		width: 70%; 
		margin-left: 10%; 
		margin-top: 30px; 
		float: left;
		border: 1px solid white;
	}	

	p{
		/* Limpando configurações de margem feita pelo navegador */
		margin:0;
		/* Alterando a margem superior de todos os parágrafos para 5 pixels */
		margin-top: 5px;
		/* Alterando a borda de todos os parágrafos para 1 pixel pontilhado */
		border: 1px dotted;
		/* Alterando a altura de todos os parágrafos para no mínimo 27 pixels */
		

		font-weight: bold;

		text-shadow: 0 1px 0 #fff;
	}

	label{
		/* Alterando o estilo da letra para o negrito */
		font-weight: bold;
		/* Alterando a largura do label */
		width: 140px;
		/* Alterando o alinhamento do texto para a direita */
		text-align: right;
		/* Alterando o modo de visualização do label para bloco para que a largura seja válida */
		display: block;
		/* Alterando a posição do label para float para alinhar o label com os campos de entrada */
		float: left;
		/* Colocando uma margem de 10 pixels do lado direito do label */
		margin-right: 10px;
		/* Alterando a borda direita do label para 1 pixel pontilhado */
		border-right: 1px dotted;
		/* Alterando borda inferior para 1 pixel pontilhado */
		border-bottom: 1px dotted;
		/* Alterando preenchimento direito do label para 5 pixels */
		padding-right: 5px;

	}
	.fontTexto{ background: #4682B4; color: white;}
	
	input[name=datainicio01], input[name=datafinal01]{ 
		color: red; 
		text-align: center;

	}

	.mar01{ background: #4682B4; color: white; text-align: center; }

	.mar00{ background: #4682B4; color: white; text-align: center; }

	.verl{ background: white; color: black; text-align: center;}

	tr:hover{ background: gold; color: red; text-align: center;}

</style>





<!-- Custom Theme Style -->

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Rank
			<small>Og</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
			<li><a href="#">Rank </a></li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
	 	<div class="box">
            <div class="box-body">
				<div class="col-md-12">	

				<div class="removeMessages"></div>
		<form name="form1" method="post" action="<?php echo 'relatorio_og.php?action' ?>" role="form">

				<div id="busca">	
					
					<p><label>Data Inicio:</label> <input type="date" name="datainicio"  id="datainicio" placeholder="Exemplo: 2016-11-01"> </p> 
					<p><label>Data Fim: </label> <input type="date" name="dataFim" id="dataFim" placeholder="Exemplo: 2016-11-11"></p>
					
					<button type ="submit" name="Submit" class="btn btn-info pull-right">Listar</button>
				</div>
				

				<table border="1" width="100%" name="tabela01">
					<tr> 
						<td colspan="3" class="fontTexto"> <center> REGISTROS GERAIS <?php echo $datainicio.' - '. $dataFim ?> </center></td>
					</tr>
					<tr>
						<td class="mar00">Regional: </td> 
						<td class="mar01"> <center> Registros </center> </td>
						
					</tr>
				</tr>

<?php

    $k = $i;
    for($i = 0; $i < $k; $i++){

?> 
	<td><center> <?php echo $regionals[$i]  ?> </center></td>  <td><center> <?php echo $totais[$i] ?> </center></td> <tr>

 
<?php

    }

?>
				
					<td colspan="8" class="fontTexto"> <center>. </center></td>
				</tr>
			</table>

		</section><!-- /.content -->
		
	</div>


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
