<?php 

require_once '../../db_connect.php';

$output = array('data' => array());

$sql = "SELECT * FROM tbog WHERE _status LIKE 'Fechado'";
$query = $connect->query($sql);

$x = 1;
while ($row = $query->fetch_assoc()) {
	$active = '';
	if($row['_status'] == 'Aberto') {
		$active = '<label class="label label-success">Aberto</label>';
	} else {
		$active = '<label class="label label-danger">Fechado</label>'; 
	}

	$actionButton = '
	<div class="btn-group">
	  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Ação <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	    <li><a type="button" data-toggle="modal" data-target="#editMemberModal" onclick="editMember('.$row['id'].')"> <span class="glyphicon glyphicon-edit"></span> Editar</a></li>
	     <li><a type="button" data-toggle="modal" data-target="#viewMemberModal" onclick="viewMember('.$row['id'].')"> <span class="glyphicon glyphicon-eye-open"></span> Visualizar</a></li>
	    <li><a type="button" data-toggle="modal" data-target="#removeMemberModal" onclick="removeMember('.$row['id'].')"> <span class="glyphicon glyphicon-trash"></span> Remover</a></li>	    
	  </ul>
	</div>
		';

	$script1 = '
	<div class="btn-group">	 	 
	   <a type="button" class="btn btn-default pull pull-right" onclick="gerarScript('.$row['id'].')"> <span class="glyphicon glyphicon-list-alt"></span> Script</a>
	</div>
		';

	$output['data'][] = array(
		$x,
		$row['assunto'],
		$row['og'],
		$row['regional'],
		date('d-m-Y',strtotime($row['dtacionamento']))." ".$row['hracionamento'],
		$active,
		$actionButton,
		$script1
	);

	$x++;
}

// database connection close
$connect->close();

echo json_encode($output);