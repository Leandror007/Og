<?php 

require_once 'db_connect.php';

$output = array('success' => false, 'messages' => array());

$memberId = $_POST['member_id'];

$sql = "DELETE FROM usuarios WHERE cod_usuario = {$memberId}";
$query = $connect->query($sql);
if($query === TRUE) {
	$output['success'] = true;
	$output['messages'] = 'Usuario removido com sucesso!!';
} else {
	$output['success'] = false;
	$output['messages'] = 'Erro na remoção do usuário!!';
}

// close database connection
$connect->close();

echo json_encode($output);