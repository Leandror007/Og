<?php 

require_once 'db_connect.php';

$data = date('Y-m-d H:i:s');




 $meses = array (1 => "Janeiro", 2 => "Fevereiro", 3 => "Março", 4 => "Abril", 5 => "Maio", 6 => "Junho", 7 => "Julho", 8 => "Agosto", 9 => "Setembro", 10 => "Outubro", 11 => "Novembro", 12 => "Dezembro");
     $diasdasemana = array (1 => "Segunda-Feira",2 => "Terca-Feira",3 => "Quarta-Feira",4 => "Quinta-Feira",5 => "Sexta-Feira",6 => "Sabado",0 => "Domingo");
     $hoje = getdate();
     $dia = $hoje["mday"];
     $mes = $hoje["mon"];
     $nomemes = $meses[$mes];
     $ano = $hoje["year"];
     $diadasemana = $hoje["wday"];
     $nomediadasemana = $diasdasemana[$diadasemana];
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

	$sql = "INSERT INTO tbog (assunto, og, notas, regional, dtacionamento, hracionamento, dataabertura, _status, semana) VALUES ('$assunto', '$og', '$notas', '$regional', '$dtacionamento', '$hracionamento','$data', 'Aberto', '$nomediadasemana')";
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