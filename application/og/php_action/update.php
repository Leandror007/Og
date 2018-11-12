<?php 

require_once 'db_connect.php';

$data = date('Y-m-d H:i:s');
//if form is submitted
if($_POST) {	

	$validator = array('success' => false, 'messages' => array());

	$id 			 = $_POST['member_id'];
	$assunto 		 = $_POST['editassunto'];
	$notas 		 	 = $_POST['editnotas'];
	$obs 			 = $_POST['editobs'];
	$codencerramento = $_POST['editcodencerramento'];	
	$dtfechamento 	 = $_POST['editdtfechamento'];	
	$hrfechamento 	 = $_POST['edithrfechamento'];	
	$_status 		 = $_POST['edit_status'];

	$sql = "UPDATE tbog SET assunto = '$assunto', notas = '$notas', obs = '$obs', datafechamento = '$data', codencerramento = '$codencerramento', dtfechamento = '$dtfechamento', hrfechamento = '$hrfechamento', _status = '$_status' WHERE id = $id";
	$query = $connect->query($sql);

	if($query === TRUE) {			
		$validator['success'] = true;
		$validator['messages'] = "Sucesso em Atualizar";		
	} else {		
		$validator['success'] = false;
		$validator['messages'] = "Erro para Atualizar";
	}

	// close the database connection
	$connect->close();

	echo json_encode($validator);

}