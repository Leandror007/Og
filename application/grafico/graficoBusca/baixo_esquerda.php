<?php
    session_start(); 

   $ds_data_in =  $_SESSION['ds_data_in'];
   $ds_data_fim =  $_SESSION['ds_data_fim'];
   
?>

<?php

  include "../../db_connect.php";

mysql_connect($servername, $username, $password);
mysql_select_db($dbname);


$lista = array();
$dens = array();
$cor = array();

$i = 0;

$sql = "SELECT regional, COUNT(regional) AS total FROM tbog WHERE dtacionamento BETWEEN '".$ds_data_in."%' and '".$ds_data_fim."%' GROUP BY regional";
//$sql = "SELECT * FROM tbl_total";
$resultado = mysql_query($sql);
while($row = mysql_fetch_object($resultado)){
   $regional = $row->regional;
   $total  = $row->total;

   $regionals[$i] = $regional;
   $totais[$i] =  $total;
   $i = $i + 1;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style type="text/css">
		#container {
    min-width: 250px;
    max-width: 700px;
    height: 400px;
    margin: 1em auto;
}
	</style>
</head>
<body>
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/variable-pie.js"></script>
	<div id="container"></div>

</body>

<script type="text/javascript">
	
Highcharts.chart('container', {
    chart: {
        type: 'variablepie'
    },
    title: {
        text: 'Analise de Og por Area.'
    },
    tooltip: {
        headerFormat: '',
        pointFormat: '<span style="color:{point.color}">\u25CF</span> <b> {point.name}</b><br/>' +
            'Area (Uni): <b>{point.y}</b><br/>' +
            'Area: <b>{point.z}</b><br/>'
    },
    series: [{
        minPointSize: 10,
        innerSize: '20%',
        zMin: 0,
        name: 'countries',
        data: [

  		<?php
          $k = $i;
          for($i = 0; $i < $k; $i++){
        ?>
       
         {
	         name: '<?php echo $regionals[$i] ?>', 
	         y: <?php echo $totais[$i] ?>,
	         z: <?php echo $totais[$i] ?>
     	},
        
 		
       <?php }  ?>


]
    }]
});

</script>
</html>