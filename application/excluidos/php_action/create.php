<?php 

require_once '../../db_connect.php';

$data = date('Y-m-d H:i:s');
//if form is submitted
if($_POST) {	

	$validator = array('success' => false, 'messages' => array());

	$assunto 		= $_POST['assunto'];	
	$og 			= $_POST['og'];
	$notas 			= $_POST['notas'];
	$regional 		= $_POST['regional'];
	$dtacionamento 	= $_POST['dtacionamento'];
	$hracionamento 	= $_POST['hracionamento'];
	$_status 		= $_POST['_status'];

	$sql = "INSERT INTO tbog (assunto, og, notas, regional, dtacionamento, hracionamento, dataabertura, _status) VALUES ('$assunto', '$og', '$notas', '$regional', '$dtacionamento', '$hracionamento','$data', 'Aberto')";
	$query = $connect->query($sql);

	if($query === TRUE) {			
		$validator['success'] = true;
		$validator['messages'] = "Adicionado com Sucesso!!";		
	} else {		
		$validator['success'] = false;
		$validator['messages'] = "Erro em salvar arquivo!!";
	}

	// close the database connection
	$connect->close();

	echo json_encode($validator);

}