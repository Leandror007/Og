<?php 

require_once '../../db_connect.php';


//if form is submitted
if($_POST) {	

	$validator = array('success' => false, 'messages' => array());

	$regiao 		    = $_POST['regiao'];
	$latitude_x 		= $_POST['latitude_x'];
	$longitude_y 		= $_POST['longitude_y'];
	$cidade 			= $_POST['cidade'];	
	

	$sql = "INSERT INTO maps (regiao, latitude_x, longitude_y, cidade) VALUES ('$regiao', '$latitude_x', '$longitude_y', '$cidade')";
	$query = $connect->query($sql);

	if($query === TRUE) {			
		$validator['success'] = true;
		$validator['messages'] = "Regiao adicionado com Sucesso!!";		
	} else {		
		$validator['success'] = false;
		$validator['messages'] = "Erro para adicionar Regiao!!";
	}

	// close the database connection
	$connect->close();

	echo json_encode($validator);

}