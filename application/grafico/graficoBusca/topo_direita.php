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
</head>
<body>
	<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>

<div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>


<script type="text/javascript">
Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Grafico Pizza Total Período'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },
    series: [{
        name: 'Porcentagem',
    data: [

    <?php
          $k = $i;
          for($i = 0; $i < $k; $i++){
        ?>
       
         { name: '<?php echo $regionals[$i] ?>', y: <?php echo $totais[$i] ?> },
        		
          <?php }  ?>
    ]
  }]
});


</script>
</body>
</html>