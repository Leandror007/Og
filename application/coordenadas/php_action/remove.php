<?php 

require_once '../../db_connect.php';

$output = array('success' => false, 'messages' => array());

$memberId = $_POST['member_id'];

$sql = "DELETE FROM maps WHERE id = {$memberId}";
$query = $connect->query($sql);
if($query === TRUE) {
	$output['success'] = true;
	$output['messages'] = 'Região removido com sucesso!!';
} else {
	$output['success'] = false;
	$output['messages'] = 'Erro na remoção da região!!';
}

// close database connection
$connect->close();

echo json_encode($output);