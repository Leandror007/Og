<?php 

require_once '../../db_connect.php';

//if form is submitted
if($_POST) {	

	$validator = array('success' => false, 'messages' => array());

	$id 				= $_POST['member_id'];
	$regiao 		    = $_POST['editregiao'];
	$latitude_x 		= $_POST['editlatitude_x'];
	$longitude_y 		= $_POST['editlongitude_y'];
	$cidade 			= $_POST['editcidade'];
	

	$sql = "UPDATE maps SET regiao = '$regiao', latitude_x = '$latitude_x', longitude_y = '$longitude_y', cidade = '$cidade' WHERE id = $id";
	$query = $connect->query($sql);

	if($query === TRUE) {			
		$validator['success'] = true;
		$validator['messages'] = "Atualizado com Sucesso!!";		
	} else {		
		$validator['success'] = false;
		$validator['messages'] = "Erro para atualizar informação!!";
	}

	// close the database connection
	$connect->close();

	echo json_encode($validator);

}