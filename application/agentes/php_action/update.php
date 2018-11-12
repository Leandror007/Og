<?php 

require_once 'db_connect.php';

//if form is submitted
if($_POST) {	

	$validator = array('success' => false, 'messages' => array());

	$id 				= $_POST['member_id'];
	$nom_usuario 		= $_POST['editNom_usuario'];
	$login 				= $_POST['editLogin'];
	$pwd_usuario 		= md5($_POST['editPwd_usuario']);
	$nivel 				= $_POST['editNivel'];
	$ds_status 			= $_POST['editDs_status'];

	$sql = "UPDATE usuarios SET nom_usuario = '$nom_usuario', login = '$login', pwd_usuario = '$pwd_usuario', nivel = '$nivel', ds_status = '$ds_status' WHERE cod_usuario = $id";
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