<?php 

require_once 'db_connect.php';


//if form is submitted
if($_POST) {	

	$validator = array('success' => false, 'messages' => array());

	$nom_usuario 		= $_POST['nom_usuario'];
	$login 				= $_POST['login'];
	$pwd_usuario 		= md5($_POST['pwd_usuario']);
	$nivel 				= $_POST['nivel'];	
	$ds_status 			= $_POST['ds_status'];

	$sql = "INSERT INTO usuarios (nom_usuario, login, pwd_usuario, nivel, ds_status) VALUES ('$nom_usuario', '$login', '$pwd_usuario', '$nivel', '$ds_status')";
	$query = $connect->query($sql);

	if($query === TRUE) {			
		$validator['success'] = true;
		$validator['messages'] = "Agente adicionado com Sucesso!!";		
	} else {		
		$validator['success'] = false;
		$validator['messages'] = "Erro para adicionar Agente!!";
	}

	// close the database connection
	$connect->close();

	echo json_encode($validator);

}