<?php
    session_start();

   $ds_data_in =  $_SESSION['ds_data_in'];
   $ds_data_fim =  $_SESSION['ds_data_fim'];
   
?>


<?php

include "../../db_connect.php";

mysql_connect($servername, $username, $password);
mysql_select_db($dbname); 

$p1 = mysql_query("SELECT COUNT(semana)
                      from tbog 
                        WHERE dataabertura BETWEEN '".$ds_data_in." 00:00:01%' and '".$ds_data_fim." 23:59:59%' and semana like 'Segunda-Feira'");
     while($seg = mysql_fetch_array($p1)){
        $segunda  = $seg['COUNT(semana)'];
     }

/* ---------------------------------------------------------------------------- */  
 
$terc = mysql_query("SELECT COUNT(semana)
                      from tbog 
                        WHERE dataabertura BETWEEN '".$ds_data_in." 00:00:01%' and '".$ds_data_fim." 23:59:59%' and semana like 'Terca-Feira'");
 while($ter = mysql_fetch_array($terc)){
        $terca  = $ter['COUNT(semana)'];
     }
 
/* ---------------------------------------------------------------------------- */  


$quar = mysql_query("SELECT COUNT(semana)
                      from tbog 
                        WHERE dataabertura BETWEEN '".$ds_data_in." 00:00:01%' and '".$ds_data_fim." 23:59:59%' and semana like 'Quarta-Feira'");
 while($quart = mysql_fetch_array($quar)){
        $quarta  = $quart['COUNT(semana)'];
     }
  

/* ---------------------------------------------------------------------------- */  

$qui = mysql_query("SELECT COUNT(semana)
                      from tbog 
                        WHERE dataabertura BETWEEN '".$ds_data_in." 00:00:01%' and '".$ds_data_fim." 23:59:59%' and semana like 'Quinta-Feira'");
 while($quin = mysql_fetch_array($qui)){
        $quinta  = $quin['COUNT(semana)'];
     }
  
 
/* ---------------------------------------------------------------------------- */  

$sext = mysql_query("SELECT COUNT(semana) 
                        from tbog 
                            WHERE dataabertura BETWEEN '".$ds_data_in." 00:00:01%' and '".$ds_data_fim." 23:59:59%' and semana like 'Sexta-Feira'");
while($sex = mysql_fetch_array($sext)){
        $sexta  = $sex['COUNT(semana)'];
     }
  

/* ---------------------------------------------------------------------------- */  

$sab = mysql_query("SELECT COUNT(semana)
                      from tbog 
                        WHERE dataabertura BETWEEN '".$ds_data_in." 00:00:01%' and '".$ds_data_fim." 23:59:59%' and semana like 'Sabado'");
while($sabad = mysql_fetch_array($sab )){
        $sabado  = $sabad['COUNT(semana)'];
     }


/* ---------------------------------------------------------------------------- */  

$dom = mysql_query("SELECT COUNT(semana)
                      from tbog 
                        WHERE dataabertura BETWEEN '".$ds_data_in." 00:00:01%' and '".$ds_data_fim." 23:59:59%' and semana like 'Domingo'");
while($domin = mysql_fetch_array($dom )){
        $domingo  = $domin['COUNT(semana)'];
     }
 



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <meta http-equiv="refresh" content="90; baixo_meio.php">
</head>


<body>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<div id="container" style="min-width: 310px; max-width: 400px; height: 400px; margin: 0 auto"></div>
    
</body>


<script type="text/javascript">
    
Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Abertura Mensal durante a Semana'
    },
    subtitle: {
        text: 'Click na Coluna.'
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Total em unidade'
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
                format: '{point.y:.1f}'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.1f}</b> Unidade<br/>'
    },

    series: [{
        name: 'Valores',
        colorByPoint: true,
        data: [{
            name: 'segunda',
            y: <?php echo "  (" . $segunda . ")" ?>,
            drilldown: 'segunda'
        }, {
            name: 'Terça',
            y: <?php echo "  (" . $terca . ")" ?>,
            drilldown: 'Terça'
        }, {
            name: 'Quarta',
            y: <?php echo "  (" . $quarta . ")" ?>,
            drilldown: 'Quarta'
        }, {
            name: 'Quinta',
            y: <?php echo "  (" . $quinta . ")" ?>,
            drilldown: 'Quinta'
        }, {
            name: 'Sexta',
            y: <?php echo "  (" . $sexta . ")" ?>,
            drilldown: 'Sexta'
        }, {
            name: 'Sabado',
            y: <?php echo "  (" . $sabado . ")" ?>,
            drilldown: null
        }, {
            name: 'Domingo',
            y: <?php echo "  (" . $domingo . ")" ?>,
            drilldown: null
        }]
    }],
    drilldown: {
        series: [{
            name: 'segunda',
            id: 'segunda',
            data: [
                [
                    'v11.0',
                    24.13
                ],
                [
                    'v8.0',
                    17.2
                ],
                [
                    'v9.0',
                    8.11
                ],
                [
                    'v10.0',
                    5.33
                ],
                [
                    'v6.0',
                    1.06
                ],
                [
                    'v7.0',
                    0.5
                ]
            ]
        }, {
            name: 'Terça',
            id: 'Terça',
            data: [
                [
                    'v40.0',
                    5
                ],
                [
                    'v41.0',
                    4.32
                ],
                [
                    'v42.0',
                    3.68
                ],
                [
                    'v39.0',
                    2.96
                ],
                [
                    'v36.0',
                    2.53
                ],
                [
                    'v43.0',
                    1.45
                ],
                [
                    'v31.0',
                    1.24
                ],
                [
                    'v35.0',
                    0.85
                ],
                [
                    'v38.0',
                    0.6
                ],
                [
                    'v32.0',
                    0.55
                ],
                [
                    'v37.0',
                    0.38
                ],
                [
                    'v33.0',
                    0.19
                ],
                [
                    'v34.0',
                    0.14
                ],
                [
                    'v30.0',
                    0.14
                ]
            ]
        }, {
            name: 'Quarta',
            id: 'Quarta',
            data: [
                [
                    'v35',
                    2.76
                ],
                [
                    'v36',
                    2.32
                ],
                [
                    'v37',
                    2.31
                ],
                [
                    'v34',
                    1.27
                ],
                [
                    'v38',
                    1.02
                ],
                [
                    'v31',
                    0.33
                ],
                [
                    'v33',
                    0.22
                ],
                [
                    'v32',
                    0.15
                ]
            ]
        }, {
            name: 'Quinta',
            id: 'Quinta',
            data: [
                [
                    'v8.0',
                    2.56
                ],
                [
                    'v7.1',
                    0.77
                ],
                [
                    'v5.1',
                    0.42
                ],
                [
                    'v5.0',
                    0.3
                ],
                [
                    'v6.1',
                    0.29
                ],
                [
                    'v7.0',
                    0.26
                ],
                [
                    'v6.2',
                    0.17
                ]
            ]
        }, {
            name: 'Sexta',
            id: 'Sexta',
            data: [
                [
                    'v12.x',
                    0.34
                ],
                [
                    'v28',
                    0.24
                ],
                [
                    'v27',
                    0.17
                ],
                [
                    'v29',
                    0.16
                ]
            ]
        }]
    }
});
</script>

</html>