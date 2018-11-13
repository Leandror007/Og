<?php 

require_once '../../db_connect.php';

$output = array('data' => array());

$sql = "SELECT * FROM usuarios";
$query = $connect->query($sql);

$x = 1;
while ($row = $query->fetch_assoc()) {
	$active = '';
	if($row['ds_status'] == 'Ativo') {
		$active = '<label class="label label-success">Ativo</label>';
	} else if($row['ds_status'] == 'Desativado') {
		$active = '<label class="label label-danger">desativado</label>'; 
	} else{
		$active = '<label class="label label-info">Vazio</label>';
	}

	$actionButton = '
	<div class="btn-group">
		<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			Ação <span class="caret"></span>
		</button>
		<ul class="dropdown-menu">
			<li><a type="button" data-toggle="modal" data-target="#editMemberModal" onclick="editMember('.$row['cod_usuario'].')"> <span class="glyphicon glyphicon-edit"></span> Editar</a></li>
			<li><a type="button" data-toggle="modal" data-target="#removeMemberModal" onclick="removeMember('.$row['cod_usuario'].')"> <span class="glyphicon glyphicon-trash"></span> Remover</a></li>	    
		</ul>
	</div>
	';

	$output['data'][] = array(
		$x,
		$row['nom_usuario'],
		$row['login'],
		$row['nivel'],
		$active,
		$actionButton
		);

	$x++;
}

// database connection close
$connect->close();

echo json_encode($output);