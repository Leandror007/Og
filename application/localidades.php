<?php
include "db_connect.php";



	header('Content-Type:text/csv; charset=latin1');
	header('Content-Disposition: attachment; filename="Localidade.csv"');

	
	$saida=fopen('php://output', 'w');

	fputcsv($saida, array('id', 'regiao', 'latitude_x', 'longitude_y', 'cidade'));
	
	$reporteCsv=$connect->query("SELECT * FROM maps ORDER BY id");
	while($filaR= $reporteCsv->fetch_assoc())
		fputcsv($saida, array($filaR['id'], 
								$filaR['regiao'],
								$filaR['latitude_x'],
								$filaR['longitude_y'],
								$filaR['cidade'],					
							
								));



?>