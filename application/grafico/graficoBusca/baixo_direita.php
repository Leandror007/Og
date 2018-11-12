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
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<div id="container" style="min-width: 310px; max-width: 400px; height: 400px; margin: 0 auto"></div>
    
</body>


  <script type="text/javascript">
    
// Create the chart
Highcharts.chart('container', {
  chart: {
        type: 'column'
    },
    title: {
        text: 'Grafico de Alames - Top 10 regionals'
    },
    subtitle: {
        text: 'Período de <?php echo $ds_data_in ?> até <?php echo $ds_data_fim ?> .'
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Total em Unidades'
        }

  },
  legend: {
    enabled: false
  },
  plotOptions: {
    series: {
      borderWidth: 0,
      dataLabels: {
        enabled: true,
        format: '{point.y:.0f} Uni'
      }
    }
  },

  tooltip: {
    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.0f} Uni </b> of total<br/>'
  },

  "series": [
    {
      "name": "Browsers",
      "colorByPoint": true,
      "data": [
        
<?php
          $k = $i;
          for($i = 0; $i < $k; $i++){
        ?>
        {
         "name": "<?php echo $regionals[$i] ?>",
         "y": <?php echo $totais[$i] ?>,
         "drilldown": "<?php echo $regionals[$i] ?>"
    },
       <?php }  ?>


      ]
    }
  ],
  "drilldown": {
    "series": [
      {
        "name": "Chrome",
        "id": "Chrome",
        "data": [
          [
            "v65.0",
            0.1
          ],
          [
            "v64.0",
            1.3
          ],
          [
            "v63.0",
            53.02
          ],
          [
            "v62.0",
            1.4
          ],
          [
            "v61.0",
            0.88
          ],
          [
            "v60.0",
            0.56
          ],
          [
            "v59.0",
            0.45
          ],
          [
            "v58.0",
            0.49
          ],
          [
            "v57.0",
            0.32
          ],
          [
            "v56.0",
            0.29
          ],
          [
            "v55.0",
            0.79
          ],
          [
            "v54.0",
            0.18
          ],
          [
            "v51.0",
            0.13
          ],
          [
            "v49.0",
            2.16
          ],
          [
            "v48.0",
            0.13
          ],
          [
            "v47.0",
            0.11
          ],
          [
            "v43.0",
            0.17
          ],
          [
            "v29.0",
            0.26
          ]
        ]
      },
      {
        "name": "Firefox",
        "id": "Firefox",
        "data": [
          [
            "v58.0",
            1.02
          ],
          [
            "v57.0",
            7.36
          ],
          [
            "v56.0",
            0.35
          ],
          [
            "v55.0",
            0.11
          ],
          [
            "v54.0",
            0.1
          ],
          [
            "v52.0",
            0.95
          ],
          [
            "v51.0",
            0.15
          ],
          [
            "v50.0",
            0.1
          ],
          [
            "v48.0",
            0.31
          ],
          [
            "v47.0",
            0.12
          ]
        ]
      },
      {
        "name": "Internet Explorer",
        "id": "Internet Explorer",
        "data": [
          [
            "v11.0",
            6.2
          ],
          [
            "v10.0",
            0.29
          ],
          [
            "v9.0",
            0.27
          ],
          [
            "v8.0",
            0.47
          ]
        ]
      },
      {
        "name": "Safari",
        "id": "Safari",
        "data": [
          [
            "v11.0",
            3.39
          ],
          [
            "v10.1",
            0.96
          ],
          [
            "v10.0",
            0.36
          ],
          [
            "v9.1",
            0.54
          ],
          [
            "v9.0",
            0.13
          ],
          [
            "v5.1",
            0.2
          ]
        ]
      },
      {
        "name": "Edge",
        "id": "Edge",
        "data": [
          [
            "v16",
            2.6
          ],
          [
            "v15",
            0.92
          ],
          [
            "v14",
            0.4
          ],
          [
            "v13",
            0.1
          ]
        ]
      },
      {
        "name": "Opera",
        "id": "Opera",
        "data": [
          [
            "v50.0",
            0.96
          ],
          [
            "v49.0",
            0.82
          ],
          [
            "v12.1",
            0.14
          ]
        ]
      }
    ]
  }
});

  </script>
</body>
</html>